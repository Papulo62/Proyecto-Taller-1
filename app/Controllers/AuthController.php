<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function index(): string
    {
        echo view($this->header);
        echo view('login');
        return view($this->footer);
    }

    public function vistaRegistro(): string
    {
        echo view($this->header);
        echo view('registro');
        return view($this->footer);
    }
}