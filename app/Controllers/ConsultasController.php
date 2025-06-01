<?php

namespace App\Controllers;

use App\Models\ConsultaModel;

class ConsultasController extends BaseController
{
    public function index()
    {
        $this->cargarVista('consultas', ['titulo' => 'Consultas']);
    }

    public function listar()
    {
        $consultaModel = new ConsultaModel();
        $data['consultas'] = $consultaModel->findAll();
        $this->cargarVistaAdmin('consultas/listar', $data);
    }

    public function insertar()
    {

        $consultaModel = new ConsultaModel();

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
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'El email es obligatorio',
                    'valid_email' => 'Debe ingresar un email válido'
                ]
            ],
            'consulta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'La consulta es obligatoria'
                ]
            ],

        ]);

        if ($validations) {
            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'apellido' => $this->request->getPost('apellido'),
                'email' => $this->request->getPost('email'),
                'consulta' => $this->request->getPost('consulta'),
            ];

            $consultaModel->insert($data);
            return redirect()->to('/consultas')->with('success', 'Consulta registrada exitosamente');
        } else {
            $this->cargarVista('consultas', [
                'validaciones' => $this->validator
            ]);
        }
    }

}