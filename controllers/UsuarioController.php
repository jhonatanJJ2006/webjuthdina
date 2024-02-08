<?php

namespace Controllers;

use MVC\Router;
use Model\Cliente;
use Model\Usuario;
use Classes\Paginacion;

class UsuarioController {

    public static function admin() {

        // Verificar si es administrador ......

        if($_SERVER['REQUEST_METHOD']) {
            $rol = $_POST['rol'];
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            $usuario = Usuario::find($id);
            $usuario->rol = $rol;
            $resultado = $usuario->guardar();
            if($resultado) {
                header('Location: /admin/usuarios');
            }
        }
    }

    public static function crear(Router $router) {

        $alertas = [];
        $usuario = new Usuario;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario->sincronizar($_POST);

            $alertas = $usuario->validar();

            if(empty($alertas)) {

                $existeUsuario = Usuario::where('email', $usuario->email);
                
                if($existeUsuario) {
                    Usuario::setAlerta('error', 'El Usuario ya esta registrado');
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hashear el password
                    $usuario->hashPassword();

                    // Eliminar password2
                    unset($usuario->password2);

                    // Crear un nuevo usuario
                    $resultado =  $usuario->guardar();                    

                    if($resultado) {
                        header('Location: /admin/usuarios');
                    }
                }

            }

        }

        $alertas = Usuario::getAlertas();

        $router->render('admin/dashboard/usuarios/crear', [
            'titulo' => 'Nuevo Usuario',
            'alertas' => $alertas,
            'usuario' => $usuario
        ]);
    }

    public static function clientes(Router $router) {

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        $registros_por_pagina = 10;
        $total = Cliente::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        
        if(!$pagina_actual || $pagina_actual < 1) {
            header('location: /admin/clientes?page=1');
        }
        
        $clientes = Cliente::paginar($registros_por_pagina, $paginacion->offset());

        $router->render('admin/dashboard/clientes/index', [
            'titulo' => 'Panel Clientes',
            'clientes' => $clientes,
            'paginacion' => $paginacion->paginacion()
        ]);

    }
}