<?php
namespace App\Controllers;
class Admin extends BaseController
{
    public function panel()
    {
        $this->cargarVistaAdmin('admin', ['titulo' => 'admin']);
    }
}