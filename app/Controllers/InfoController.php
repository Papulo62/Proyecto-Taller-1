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

    public function vistaTerminos()
    {
        $this->cargarVista('terminos_y_uso');
    }

    public function vistaSobreNosotros()
    {
        $this->cargarVista('sobre_nosotros');
    }
}