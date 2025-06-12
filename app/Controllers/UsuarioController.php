<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class UsuarioController extends BaseController
{
    protected $usuarioModel;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    public function listar()
    {
        $data['usuarios'] = $this->usuarioModel->findAllUsers();
        $this->cargarVistaAdmin('usuarios/listar', $data);
    }

    public function cambiarRol($id)
    {
        $usuario = $this->usuarioModel->find($id);
        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }
        $nuevo_rol = ($usuario['rol_id'] == 1) ? 2 : 1;
        $this->usuarioModel->update($id, ['rol_id' => $nuevo_rol]);
        return redirect()->to('admin/usuarios')->with('success', 'Rol actualizado correctamente');
    }
}