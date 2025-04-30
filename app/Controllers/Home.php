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

    public function vistaPreguntasFrecuentes()
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
