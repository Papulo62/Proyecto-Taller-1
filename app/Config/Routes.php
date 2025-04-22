<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('productos', 'ProductosController::index');
$routes->get('detalle_producto', 'ProductosController::vistaDetalleProducto');
$routes->get('favoritos', 'ProductosController::vistaFavoritos');
$routes->get('login', 'AuthController::index');
$routes->get('registro', 'AuthController::vistaRegistro');
$routes->get('preguntas_frecuentes', 'InfoController::index');
$routes->get('contactos', 'InfoController::vistaContactos');
$routes->get('comercializacion', 'InfoController::vistaComercializacion');
$routes->get('consultas', 'ConsultasController::index');
$routes->get('terminos_y_uso', 'InfoController::vistaTerminos');
$routes->get('acerca_de', 'InfoController::vistaAcerca');
$routes->get('carrito', 'CarritoController::index');
$routes->get('compra', 'Home::vistaCompra');