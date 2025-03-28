<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        echo view($this->header);
        echo view('inicio');
        return view($this->footer);
    }
}
