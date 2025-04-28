<?php

namespace App\Controllers;

class ProductosController extends BaseController
{
  public function index()
  {
    $this->cargarVista('productos', ['titulo' => 'Productos']);
  }

  public function vistaDetalleProducto()
  {
    $this->cargarVista('detalle_producto', ['titulo' => 'Detalle de Producto']);
  }

  public function vistaFavoritos()
  {
    $this->cargarVista('favoritos', ['titulo' => 'Favoritos']);
  }
}