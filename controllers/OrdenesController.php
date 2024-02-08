<?php 

namespace Controllers;

use MVC\Router;
use Model\Pedido;
use Model\Cliente;
use Classes\Paginacion;

class OrdenesController {

    public static function index(Router $router) {

        $clientes = Cliente::all();

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        $registros_por_pagina = 8;
        $total = Pedido::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        
        if(!$pagina_actual || $pagina_actual < 1) {
            header('location: /admin/ordenes?page=1');
        }
        
        $pedidos = Pedido::paginar($registros_por_pagina, $paginacion->offset());

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if($_POST['fecha']) {
                $fecha = $_POST['fecha'];
                $pedidos = Pedido::where('fecha_entrega', $fecha);
            }

            if($_POST['estado']) {
                $estado = $_POST['estado'];
                $pedidos = Pedido::where('estado_id', $estado);
            }
        }

        $router->render('/admin/dashboard/pedidos/index', [
            'titulo' => 'Pedidos',
            'pedidos' => $pedidos,
            'clientes' => $clientes,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function informacion(Router $router) {

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);            

        if(!$id) {
            header('Location: /admin/fabrica/pedidos');
        }
        
        $pedido = Pedido::find($id);
        
        if(!$pedido) {
            header('Location: /admin/fabrica/pedidos');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        }

        $router->render('/admin/dashboard/pedidos/informacion',[
            'titulo' => 'Resumen del Pedido',
            'pedido' => $pedido,
            'admin' => true
        ]);
    }
}