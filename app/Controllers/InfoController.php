<?php

namespace App\Controllers;

class InfoController extends BaseController
{
    public function index()
    {
        $this->cargarVista('preguntas_frecuentes');
    }

    public function vistaComercializacion()
    {
        $this->cargarVista('comercializacion', ['titulo' => 'Comercializacion']);
    }

    public function vistaTerminos()
    {
        $this->cargarVista('terminos_y_uso', ['titulo' => 'Terminos y Condiciones de Uso']);
    }

    public function vistaSobreNosotros()
    {
        $this->cargarVista('sobre_nosotros', ['titulo' => 'Sobre Nosotros']);
    }
}