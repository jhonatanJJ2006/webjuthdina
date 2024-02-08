<?php

namespace Controllers;

use DateTime;
use MVC\Router;
use Model\Pedido;
use Intervention\Image\ImageManagerStatic as Image;

class PedidoController {

    public static function crear(Router $router) {

        $alertas = [];
        $pedido = new Pedido;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes_pedidos = '../public/build/img/pedidos';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes_pedidos)) {
                    mkdir($carpeta_imagenes_pedidos, 0755, true);
                }            

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png',80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp',80);

                $nombre_imagen = md5(uniqid(rand(), true));
                
                $_POST['imagen'] = $nombre_imagen;
            } 

            if(!empty($_FILES['adicional']['tmp_name'])) {
                $carpeta_imagenes_adicional = '../public/build/img/adicional';

                // Crear la carpeta si no existe
                
                if(!is_dir($carpeta_imagenes_adicional)) {
                    mkdir($carpeta_imagenes_adicional, 0755, true);
                }

                $imagen_png_adicional = Image::make($_FILES['adicional']['tmp_name'])->fit(800,800)->encode('png',80);
                $imagen_webp_adicional = Image::make($_FILES['adicional']['tmp_name'])->fit(800,800)->encode('webp',80);

                $nombre_imagen_adicional = md5(uniqid(rand(), true));

                $_POST['imagen_adicional'] = $nombre_imagen_adicional;
            } 

            $_POST['fabrica_id'] = $_SESSION['fabrica'];

            date_default_timezone_set('America/Guayaquil');

            $fecha_actual = new DateTime();
            $fecha_actual = $fecha_actual->format("Y-m-d");

            $hora_actual = new DateTime();
            $hora_actual = $hora_actual->format("H:i");
            
            $_POST['fecha_actual'] = $fecha_actual;
            $_POST['hora_actual'] = $hora_actual;

            $pedido->sincronizar($_POST);

            $alertas = $pedido->validar();

            if(empty($alertas)) {

                // Guardar las imagenes
                if($_FILES['imagen']) {
                    $imagen_png->save($carpeta_imagenes_pedidos . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes_pedidos . '/' . $nombre_imagen . ".webp");

                    if($_FILES['adicional']) {
                        if($_POST['adicional']) {
                            $imagen_png_adicional->save($carpeta_imagenes_adicional . '/' . $nombre_imagen_adicional . ".png");
                            $imagen_webp_adicional->save($carpeta_imagenes_adicional . '/' . $nombre_imagen_adicional . ".webp");
                        }
                    }
                }
                
                // Crear un nuevo pedido
                $resultado =  $pedido->guardar();                    

                if($resultado) {
                    header('Location: /local/ordenes');
                }
            }

        }

        $alertas = Pedido::getAlertas();

        $router->render('admin/local/crear', [
            'titulo' => 'Nuevo Pedido',
            'alertas' => $alertas,
            'pedido' => $pedido
        ]);
    }
}