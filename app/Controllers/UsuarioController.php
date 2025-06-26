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
        $data['usuarios'] = $this->usuarioModel->where('activo', 1)->findAllUsers();
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

    public function eliminarCuenta($id = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');

        if ($id != $userId) {
            return redirect()->to('/perfil')->with('error', 'No puedes desactivar esta cuenta');
        }

        $usuario = $this->usuarioModel->find($userId);

        if ($usuario) {
            $this->usuarioModel->update($userId, ['activo' => 0]);
        }

        session()->destroy();

        return redirect()->to('/')->with('success', 'Tu cuenta ha sido desactivada exitosamente');
    }



    public function miPerfil()
    {
        $usuarioId = session()->get('user_id');

        if (!$usuarioId) {
            return redirect()->to('login')->with('error', 'Debe iniciar sesión');
        }

        $usuario = $this->usuarioModel->find($usuarioId);

        if (!$usuario) {
            return redirect()->to('login')->with('error', 'Usuario no encontrado');
        }

        return view('perfil/mi_perfil', [
            'usuario' => $usuario
        ]);
    }

    public function editarPerfil()
    {
        $usuarioId = session()->get('user_id');

        if (!$usuarioId) {
            return redirect()->to('login')->with('error', 'Debe iniciar sesión');
        }

        $usuario = $this->usuarioModel->find($usuarioId);

        if (!$usuario) {
            return redirect()->to('login')->with('error', 'Usuario no encontrado');
        }

        $this->cargarVista('perfil_actualizar', [
            'titulo' => 'ACTUALIZAR PERFIL',
            'usuario' => $usuario
        ]);
    }

    public function actualizarPerfil()
    {
        $usuarioId = session()->get('user_id');

        if (!$usuarioId) {
            return redirect()->to('login')->with('error', 'Debe iniciar sesión');
        }


        $validations = $this->validate([
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El nombre es obligatorio'
                ]
            ],
            'apellido' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El apellido es obligatorio'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[usuario.email,id,' . $usuarioId . ']',
                'errors' => [
                    'required' => 'El email es obligatorio',
                    'valid_email' => 'Debe ingresar un email válido',
                    'is_unique' => 'Este email ya está registrado'
                ]
            ],
            'direccion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'La dirección es obligatoria'
                ]
            ]
        ]);

        $nuevaContraseña = $this->request->getPost('contraseña');
        if (!empty($nuevaContraseña)) {
            $validacionContraseña = $this->validate([
                'contraseña' => [
                    'rules' => 'min_length[8]',
                    'errors' => [
                        'min_length' => 'La contraseña debe tener al menos 8 caracteres'
                    ]
                ],
                'c-contraseña' => [
                    'rules' => 'matches[contraseña]',
                    'errors' => [
                        'matches' => 'Las contraseñas deben coincidir'
                    ]
                ]
            ]);

            if (!$validacionContraseña) {
                $validations = false;
            }
        }

        if ($validations) {
            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'apellido' => $this->request->getPost('apellido'),
                'email' => $this->request->getPost('email'),
                'direccion' => $this->request->getPost('direccion')
            ];

            if (!empty($nuevaContraseña)) {
                $data['contraseña'] = password_hash($nuevaContraseña, PASSWORD_DEFAULT);
            }

            $this->usuarioModel->update($usuarioId, $data);
            return redirect()->to('usuario_perfil')->with('success', 'Perfil actualizado correctamente');
        } else {
            $usuario = $this->usuarioModel->find($usuarioId);
            return view('perfil/editar_perfil', [
                'usuario' => $usuario,
                'validaciones' => $this->validator
            ]);
        }
    }
}