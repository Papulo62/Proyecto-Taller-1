<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function index()
    {
        $this->cargarVista('login');
    }

    public function vistaRegistro()
    {
        $this->cargarVista('registro');
    }
}