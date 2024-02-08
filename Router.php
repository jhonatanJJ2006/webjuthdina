<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas()
    {

        $url_actual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$url_actual] ?? null;
        } else {
            $fn = $this->postRoutes[$url_actual] ?? null;
        }

        if ( $fn ) {
            call_user_func($fn, $this);
        } else {
            echo "Página No Encontrada o Ruta no válida";
        }
    }

    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value; 
        }

        ob_start(); 

        include_once __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); // Limpia el Buffer

        // Utilizar el layout de acuerdo a la URL
        $url_actual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';

        if(str_contains($url_actual, '/admin')) {
            if(!is_admin()) {
                header('Location: /');
            }
            include_once __DIR__ . '/views/admin-layout.php';
        } elseif(str_contains($url_actual, '/local')) {
            if(!is_local()) {
                header('Location: /');
            }
            include_once __DIR__ . '/views/local-layout.php';
        } elseif(str_contains($url_actual, '/fabrica-1')) {
            if(!is_fabrica1()) {
                header('Location: /');
            }
            include_once __DIR__ . '/views/fabrica-1-layout.php';
        } elseif(str_contains($url_actual, '/fabrica-2')) {
            if(!is_fabrica2()) {
                header('Location: /');
            }
            include_once __DIR__ . '/views/fabrica-2-layout.php';
        } else {
            include_once __DIR__ . '/views/auth-layout.php';
        }
    }
}
