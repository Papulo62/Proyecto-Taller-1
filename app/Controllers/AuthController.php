<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class AuthController extends BaseController
{
    protected $usuarioModel;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }
    public function index()
    {
        $this->cargarVista('login', ['titulo' => 'Login']);
    }

    public function vistaRegistro()
    {
        $this->cargarVista('registro', ['titulo' => 'Registrarse']);
    }
    public function register()
    {
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
                'rules' => 'required|valid_email|is_unique[usuario.email]',
                'errors' => [
                    'required' => 'El email es obligatorio',
                    'valid_email' => 'Debe ingresar un email válido',
                    'is_unique' => 'Este email ya está registrado'
                ]
            ],
            'contraseña' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'La contraseña es obligatoria',
                    'min_length' => 'La contraseña debe tener al menos 8 caracteres'
                ]
            ],
            'c-contraseña' => [
                'rules' => 'required|min_length[8]|matches[contraseña]',
                'errors' => [
                    'required' => 'La contraseña es obligatoria',
                    'min_length' => 'La contraseña debe tener al menos 8 caracteres',
                    'matches' => 'Las contraseñas deben coincidir'
                ]
            ],
            'direccion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'La dirección es obligatoria'
                ]
            ]
        ]);

        if ($validations) {
            $contraseña = password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT);
            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'apellido' => $this->request->getPost('apellido'),
                'email' => $this->request->getPost('email'),
                'contraseña' => $contraseña,
                'direccion' => $this->request->getPost('direccion'),
                'rol_id' => 1
            ];

            $this->usuarioModel->insert($data);
            return redirect()->to('/login')->with('success', 'Usuario registrado correctamente');
        } else {
            $this->cargarVista('registro', [
                'validaciones' => $this->validator
            ]);
        }
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
        $rol_actual = $usuario['rol_id'];
        $nuevo_rol = ($rol_actual == 1) ? 2 : 1;
        $this->usuarioModel->update($id, ['rol_id' => $nuevo_rol]);
        return redirect()->to('admin/usuarios')->with('success', 'Rol actualizado correctamente');
    }


    public function editar($id)
    {
        $usuario = $this->usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }

        return $this->cargarVistaAdmin('usuarios/actualizar', [
            'usuario' => $usuario
        ]);
    }

    public function actualizar($id)
    {
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
                'rules' => 'required|valid_email|is_unique[usuario.email,id,' . $id . ']',
                'errors' => [
                    'required' => 'El email es obligatorio',
                    'valid_email' => 'Debe ingresar un email válido',
                    'is_unique' => 'Este email ya está registrado'
                ]
            ],
            'contraseña' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'La contraseña es obligatoria',
                    'min_length' => 'La contraseña debe tener al menos 8 caracteres'
                ]
            ],
            'c-contraseña' => [
                'rules' => 'required|min_length[8]|matches[contraseña]',
                'errors' => [
                    'required' => 'La contraseña es obligatoria',
                    'min_length' => 'La contraseña debe tener al menos 8 caracteres',
                    'matches' => 'Las contraseñas deben coincidir'
                ]
            ],
            'direccion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'La dirección es obligatoria'
                ]
            ]
        ]);

        if ($validations) {
            $contraseña = password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT);
            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'apellido' => $this->request->getPost('apellido'),
                'email' => $this->request->getPost('email'),
                'contraseña' => $contraseña,
                'direccion' => $this->request->getPost('direccion'),
                'rol_id' => 1
            ];

            $this->usuarioModel->update($id, $data);
            return redirect()->to('admin/usuarios')->with('success', 'Usuario actualizado correctamente');
        } else {
            $usuario = $this->usuarioModel->find($id);
            return $this->cargarVistaAdmin('usuarios/actualizar', [
                'usuario' => $usuario,
                'validaciones' => $this->validator
            ]);
        }
    }

    public function eliminar($id)
    {
        $this->usuarioModel->delete($id);
        return redirect()->to('admin/usuarios')->with('success', 'Usuario eliminado correctamente');
    }

    public function login()
    {
        $validations = $this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'El email es obligatorio',
                    'valid_email' => 'Debe ingresar un email válido',
                ]
            ],
            'contraseña' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'La contraseña es obligatoria',
                    'min_length' => 'La contraseña debe tener al menos 8 caracteres'
                ]
            ],
        ]);

        if (!$validations) {
            return $this->cargarVista('login', [
                'titulo' => 'Login',
                'validaciones' => $this->validator
            ]);
        }

        $session = session();
        $contraseña = $this->request->getPost('contraseña');
        $email = $this->request->getPost('email');
        $usuario = $this->usuarioModel->where('email', $email)->first();

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }

        if (password_verify($contraseña, $usuario['contraseña'])) {
            $data = [
                'user_id' => $usuario['id'],
                'user_name' => $usuario['nombre'],
                'logged_in' => true,
            ];
            $session->set($data);
            return redirect()->to('/');
        } else {
            return redirect()->back()->with('error', 'Credenciales incorrectas');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}