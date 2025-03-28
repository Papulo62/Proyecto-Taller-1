<?php

namespace App\Controllers;

class ProductosController extends BaseController
{
    public function index(): string
    {
        echo view($this->header);
        echo view('productos');
        return view($this->footer);
    }
}