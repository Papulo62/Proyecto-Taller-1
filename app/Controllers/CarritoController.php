<?php

namespace App\Controllers;

class CarritoController extends BaseController
{
    public function index()
    {
        $this->cargarVista('carrito');
    }

}