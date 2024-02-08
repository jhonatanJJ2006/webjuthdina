<?php

namespace Controllers;

use DateTime;
use MVC\Router;
use Model\Pedido;
use Model\Cliente;
use Classes\Paginacion;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Estado;

class LocalController {

    public static function index(Router $router) {
        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administración'
        ]);
    }

    public static function tabla(Router $router) {

        session_start();

        $clientes = Cliente::all();
        $estados = Estado::all();

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        $registros_por_pagina = 5;
        $total = Pedido::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        
        if(!$pagina_actual || $pagina_actual < 1) {
            header('location: /local/ordenes?page=1');
        }
        
        if($_SESSION['fabrica'] == 1) {
            $pedidos = Pedido::paginar_1($registros_por_pagina, $paginacion->offset());
        } else {
            $pedidos = Pedido::paginar_2($registros_por_pagina, $paginacion->offset());
        }


        $router->render('admin/local/index', [
            'titulo' => 'Pedidos',
            'pedidos' => $pedidos,
            'clientes' => $clientes,
            'estados' => $estados,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

}
