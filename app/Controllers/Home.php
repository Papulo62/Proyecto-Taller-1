<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $this->cargarVista('inicio', ['titulo' => 'Inicio']);
    }

    public function vistaCompra()
    {
        $this->cargarVista('compra', ['titulo' => 'Compra']);
    }

    public function vistaContactos()
    {
        $this->cargarVista('contactos', ['titulo' => 'Contacto']);
    }
}
