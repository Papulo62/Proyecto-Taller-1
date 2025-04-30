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
$routes->get('registro', 'AuthController::vistaRegistro');
$routes->get('consultas', 'ConsultasController::index');
$routes->get('carrito', 'CarritoController::index');
