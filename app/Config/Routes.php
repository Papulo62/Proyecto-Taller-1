<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('productos', 'ProductosController::index');
$routes->get('detalle_producto', 'ProductosController::vistaDetalleProducto');

$routes->get('login', 'AuthController::index');
$routes->get('registro', 'AuthController::vistaRegistro');

