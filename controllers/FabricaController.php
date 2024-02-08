<?php

namespace Controllers;

use DateTime;
use MVC\Router;
use DateTimeZone;
use Model\Pedido;
use Classes\Meses;
use Model\Cliente;
use Classes\Paginacion;
use Model\Estado;

class FabricaController {

    public static function index(Router $router) {
        $router->render('admin/fabrica/index', [
            'titulo' => 'Panel de Administración'
        ]);
    }

    public static function ordenes_1(Router $router) {

        $clientes = Cliente::all();
        $estados = Estado::all();

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        $registros_por_pagina = 8;
        $total = Pedido::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        
        if(!$pagina_actual || $pagina_actual < 1) {
            header('location: /fabrica-1/pedidos?page=1');
        }
        
        $pedidos = Pedido::paginar_1($registros_por_pagina, $paginacion->offset());

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if($_POST['fecha']) {
                $fecha = $_POST['fecha'];
                $pedidos = Pedido::where_doble('fecha_entrega', $fecha, 'fabrica_id', '1');
            }

            if($_POST['estado']) {
                $estado = $_POST['estado'];
                $pedidos = Pedido::where_doble('estado_id', $estado, 'fabrica_id', '1');
            }

            if($_POST['id']) {
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);
                if(!$id) {
                    header('Location: /fabrica-1/pedidos');
                }

                $pedido = Pedido::find($id);
                $pedido->estado_id = 2;
                $resultado = $pedido->guardar();

                if($resultado) {
                    header('Location: /fabrica-1/pedidos');
                }
            }
        }

        $router->render('admin/fabrica/ordenes',[
            'titulo' => 'Pedidos',
            'pedidos' => $pedidos,
            'clientes' => $clientes,
            'estados' => $estados,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function ordenes_2(Router $router) {

        $clientes = Cliente::all();
        $estados = Estado::all();

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        $registros_por_pagina = 8;
        $total = Pedido::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        
        if(!$pagina_actual || $pagina_actual < 1) {
            header('location: /fabrica-2/pedidos?page=1');
        }
        
        $pedidos = Pedido::paginar_2($registros_por_pagina, $paginacion->offset());

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if($_POST['fecha']) {
                $fecha = $_POST['fecha'];
                $pedidos = Pedido::where_doble('fecha_entrega', $fecha, 'fabrica_id', '2');
            }

            if($_POST['estado']) {
                $estado = $_POST['estado'];
                $pedidos = Pedido::where_doble('estado_id', $estado, 'fabrica_id', '2');
            }

            if($_POST['id']) {
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);
                if(!$id) {
                    header('Location: /fabrica-2/pedidos');
                }

                $pedido = Pedido::find($id);
                $pedido->estado_id = 2;
                $resultado = $pedido->guardar();

                if($resultado) {
                    header('Location: /fabrica-2/pedidos');
                }
            }
        }

        $router->render('admin/fabrica/ordenes',[
            'titulo' => 'Pedidos',
            'pedidos' => $pedidos,
            'clientes' => $clientes,
            'estados' => $estados,
            'paginacion' => $paginacion->paginacion()
        ]);
    }
    
    public static function informacion1(Router $router) {

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);            

        if(!$id) {
            header('Location: /fabrica-1/pedidos');
        }
        
        $pedido = Pedido::find($id);
        
        if(!$pedido) {
            header('Location: /fabrica-1/pedidos');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if(!$id) {
                header('Location: /fabrica-1/pedidos');
            }

            $pedido = Pedido::find($id);
            $pedido->estado_id = 3;
            $resultado = $pedido->guardar();

            if($resultado) {
                header('Location: /fabrica-1/pedidos');
            }
        }

        $router->render('/admin/dashboard/pedidos/informacion',[
            'titulo' => 'Resumen del Pedido',
            'pedido' => $pedido
        ]);
    }
    public static function informacion2(Router $router) {

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);            

        if(!$id) {
            header('Location: /fabrica-2/pedidos');
        }
        
        $pedido = Pedido::find($id);
        
        if(!$pedido) {
            header('Location: /fabrica-2/pedidos');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if(!$id) {
                header('Location: /fabrica-2/pedidos');
            }

            $pedido = Pedido::find($id);
            $pedido->estado_id = 3;
            $resultado = $pedido->guardar();

            if($resultado) {
                header('Location: /fabrica-2/pedidos');
            }
        }

        $router->render('/admin/dashboard/pedidos/informacion',[
            'titulo' => 'Resumen del Pedido',
            'pedido' => $pedido
        ]);
    }

    public static function calendario1(Router $router) {

        $mes = date("m");
        $año = date("Y");
        $numero = 0;

        $zona_horaria = 'America/Guayaquil'; // Reemplaza con tu zona horaria

        // Crea un objeto DateTime con la zona horaria especificada
        $fecha_actual = new DateTime('now', new DateTimeZone($zona_horaria));

        // Obtén el día actual
        $dia_actual = $fecha_actual->format('d');
        
        $pagina_actual = $_GET['mes'];

        if(!$pagina_actual || $pagina_actual >= 13) {
            header('Location: /fabrica-1/calendario?mes='. $mes);
        }

        $dias = cal_days_in_month(CAL_GREGORIAN, $pagina_actual, $año);
        
        $mostrar_meses = new Meses($pagina_actual, $dias);
        
        if(!$pagina_actual) {
            header('location: /fabrica-1/calendario?meses='. $mes);
        }
        
        $pedidos = Pedido::where('fabrica_id', '1');

        $router->render('admin/fabrica/calendario-1',[
            'titulo' => 'Calendario',
            'pedidos' => $pedidos,
            'paginacion' => $mostrar_meses->paginacion(),
            'mostrar_meses' => $mostrar_meses,
            'dia_actual' => $dia_actual,
            'numero' => $numero
        ]);
    }

    public static function calendario2(Router $router) {

        $mes = date("m");
        $año = date("Y");
        $numero = 0;

        $zona_horaria = 'America/Guayaquil'; // Reemplaza con tu zona horaria

        // Crea un objeto DateTime con la zona horaria especificada
        $fecha_actual = new DateTime('now', new DateTimeZone($zona_horaria));

        // Obtén el día actual
        $dia_actual = $fecha_actual->format('d');
        
        $pagina_actual = $_GET['mes'];

        if(!$pagina_actual || $pagina_actual >= 13) {
            header('Location: /fabrica-2/calendario?mes='. $mes);
        }

        $dias = cal_days_in_month(CAL_GREGORIAN, $pagina_actual, $año);
        
        $mostrar_meses = new Meses($pagina_actual, $dias);
        
        if(!$pagina_actual) {
            header('location: /fabrica-2/calendario?meses='. $mes);
        }
        
        $pedidos = Pedido::where('fabrica_id', '2');

        $router->render('admin/fabrica/calendario-2',[
            'titulo' => 'Calendario',
            'pedidos' => $pedidos,
            'paginacion' => $mostrar_meses->paginacion(),
            'mostrar_meses' => $mostrar_meses,
            'dia_actual' => $dia_actual,
            'numero' => $numero
        ]);
    }
}

