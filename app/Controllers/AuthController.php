<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function index()
    {
        $this->cargarVista('login', ['titulo' => 'Login']);
    }

    public function vistaRegistro()
    {
        $this->cargarVista('registro', ['titulo' => 'Registrarse']);
    }

}