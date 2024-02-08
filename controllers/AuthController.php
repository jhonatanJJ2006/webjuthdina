<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class AuthController {

    public static function login(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario = new Usuario($_POST);

            $alertas = $usuario->validarLogin();

            
            if(empty($alertas)) {
                // Verificar quel el usuario exista
                $usuario = Usuario::where('email', $usuario->email);
                $usuario = reset($usuario);

                if(!$usuario) {
                    Usuario::setAlerta('error', 'El Usuario No Existe o no esta confirmado');
                } else {
                    // El Usuario existe
                    if( password_verify($_POST['password'], $usuario->password) ) {
                        
                        // Iniciar la sesión
                        session_start();    
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['apellido'] = $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['rol'] = $usuario->rol ?? 0;
                        $_SESSION['fabrica'] = $usuario->fabrica ?? 0;

                        if($usuario->rol == 1) {
                            header('Location: /admin/dashboard');
                        }
                        if($usuario->rol == 2) {
                            header('Location: /local/dashboard');
                        }
                        if($usuario->rol == 3) {
                            if($usuario->fabrica == 1) {
                                header('Location: /fabrica-1/dashboard');
                            }
                            if($usuario->fabrica == 2) {
                                header('Location: /fabrica-2/dashboard');
                            }
                        }
                        
                    } else {
                        Usuario::setAlerta('error', 'Password Incorrecto o Usuario no Confirmado');
                    }
                }
            }

        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión',
            'alertas' => $alertas
        ]);
    }
    
    public static function logout() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION = [];
            header('Location: /');
        }  
    }
}