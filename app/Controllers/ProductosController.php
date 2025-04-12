<?php

namespace App\Controllers;

class ProductosController extends BaseController
{
  public function index()
  {
    $this->cargarVista('productos');
  }

  public function vistaDetalleProducto()
  {
    $this->cargarVista('detalle_producto');
  }

  public function vistaFavoritos()
  {
    $this->cargarVista('favoritos');
  }
}