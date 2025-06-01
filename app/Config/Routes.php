<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('terminos_y_uso', 'Home::vistaTerminos');
$routes->get('sobre_nosotros', 'Home::vistaSobreNosotros');
$routes->get('preguntas_frecuentes', 'Home::vistaPreguntasFrecuentes');
$routes->get('contactos', 'Home::vistaContactos');
$routes->get('comercializacion', 'Home::vistaComercializacion');
$routes->get('compra', 'Home::vistaCompra');
$routes->get('productos', 'ProductosController::index');
$routes->get('detalle_producto', 'ProductosController::vistaDetalleProducto');
$routes->get('favoritos', 'ProductosController::vistaFavoritos');
$routes->get('login', 'AuthController::index');
$routes->get('consultas', 'ConsultasController::index');
$routes->post('insertar', 'ConsultasController::insertar');
$routes->get('carrito', 'CarritoController::index');
$routes->get('registro', 'AuthController::vistaRegistro');
$routes->post('registrar', 'AuthController::register');
$routes->post('login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');
$routes->group('admin', function ($routes) {
    $routes->get('/', 'Admin::panel');
    $routes->get('usuarios/editar/(:num)', 'AuthController::editar/$1');
    $routes->post('usuarios/actualizar/(:num)', 'AuthController::actualizar/$1');
    $routes->post('usuarios/eliminar/(:num)', 'AuthController::eliminar/$1');
    $routes->get('usuarios', 'UsuarioController::listar');
    $routes->get('usuarios/cambiar_rol/(:num)', 'UsuarioController::cambiarRol/$1');
    $routes->get('productos/agregar', 'ProductosController::producto');
    $routes->post('productos/insertar', 'ProductosController::insertar');


    $routes->get('consultas', 'ConsultasController::listar');

});