<?php

namespace Controllers;

use DateTime;
use MVC\Router;
use DateTimeZone;
use Model\Pedido;
use Classes\Meses;
use Model\Usuario;

class AdminController {
    
    public static function index(Router $router) {
        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administración'
        ]);
    }

    public static function usuarios(Router $router) {

        $usuarios = Usuario::all();

        $router->render('admin/dashboard/usuarios/index', [
            'titulo' => 'Panel de Administración de Usuarios',
            'usuarios' => $usuarios
        ]);
    }

    public static function calendario(Router $router) {

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
            header('Location: /admin/calendario?mes='. $mes);
        }

        $dias = cal_days_in_month(CAL_GREGORIAN, $pagina_actual, $año);
        
        $mostrar_meses = new Meses($pagina_actual, $dias);
        
        if(!$pagina_actual) {
            header('location: /admin/calendario?meses='. $mes);
        }
        
        $pedidos = Pedido::all();

        $router->render('admin/dashboard/calendario/index',[
            'titulo' => 'Calendario',
            'pedidos' => $pedidos,
            'paginacion' => $mostrar_meses->paginacion(),
            'mostrar_meses' => $mostrar_meses,
            'dia_actual' => $dia_actual,
            'numero' => $numero
        ]);
    }
}