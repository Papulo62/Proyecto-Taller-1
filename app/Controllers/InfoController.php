<?php

namespace App\Controllers;

class InfoController extends BaseController
{
    public function index()
    {
        $this->cargarVista('preguntas_frecuentes');
    }

    public function vistaContactos()
    {
        $this->cargarVista('contactos');
    }

    public function vistaComercializacion()
    {
        $this->cargarVista('comercializacion');
    }
}