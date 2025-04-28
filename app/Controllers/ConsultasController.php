<?php

namespace App\Controllers;

class ConsultasController extends BaseController
{
    public function index()
    {
        $this->cargarVista('consultas', ['titulo' => 'Consultas']);
    }

}