<?php 
require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\AuthController;
use Controllers\FabricaController;
use Controllers\LocalController;
use Controllers\OrdenesController;
use Controllers\PedidoController;
use Controllers\UsuarioController;
use MVC\Router;

$router = new Router();

// Login
$router->get('/', [AuthController::class, 'login']);
$router->post('/', [AuthController::class, 'login']);

$router->post('/logout', [AuthController::class, 'logout']);


// Admin
$router->get('/admin/dashboard', [AdminController::class, 'index']);

    // Usuarios
$router->get('/admin/usuarios', [AdminController::class, 'usuarios']);

$router->get('/admin/usuarios', [AdminController::class, 'usuarios']);

    // Usuarios Crear
$router->get('/admin/usuarios/crear', [UsuarioController::class, 'crear']);
$router->post('/admin/usuarios/crear', [UsuarioController::class, 'crear']);

    // Usuarios Admin
$router->post('/admin/usuario/admin', [UsuarioController::class, 'admin']);
$router->post('/admin/usuario/logout', [UsuarioController::class, 'admin_logout']);

    // Admin Clientes
$router->get('/admin/clientes', [UsuarioController::class, 'clientes']);

    // Admin Ordenes
$router->get('/admin/ordenes', [OrdenesController::class, 'index']);
$router->post('/admin/ordenes', [OrdenesController::class, 'index']);

$router->get('/admin/ordenes/informacion', [OrdenesController::class, 'informacion']);
$router->post('/admin/ordenes/informacion', [OrdenesController::class, 'informacion']);

    // Admin Calendario
$router->get('/admin/calendario', [AdminController::class, 'calendario']);


// Local
$router->get('/local/dashboard', [LocalController::class, 'index']);
$router->get('/local/ordenes', [LocalController::class, 'tabla']);

$router->get('/local/orden/crear', [PedidoController::class, 'crear']);
$router->post('/local/orden/crear', [PedidoController::class, 'crear']);


// Fabrica
$router->get('/fabrica-1/dashboard', [FabricaController::class, 'index']);
$router->get('/fabrica-2/dashboard', [FabricaController::class, 'index']);

    // Fabrica Pedidos
$router->get('/fabrica-1/pedidos', [FabricaController::class, 'ordenes_1']);
$router->post('/fabrica-1/pedidos', [FabricaController::class, 'ordenes_1']);

$router->get('/fabrica-2/pedidos', [FabricaController::class, 'ordenes_2']);
$router->post('/fabrica-2/pedidos', [FabricaController::class, 'ordenes_2']);

    // Fabrica Pedidos Informacion
$router->get('/fabrica-1/pedidos/informacion', [FabricaController::class, 'informacion1']);
$router->post('/fabrica-1/pedidos/informacion', [FabricaController::class, 'informacion1']);

$router->get('/fabrica-2/pedidos/informacion', [FabricaController::class, 'informacion2']);
$router->post('/fabrica-2/pedidos/informacion', [FabricaController::class, 'informacion2']);

    // Fabrica Calendario
$router->get('/fabrica-1/calendario', [FabricaController::class, 'calendario1']);
$router->get('/fabrica-2/calendario', [FabricaController::class, 'calendario2']);

$router->comprobarRutas();