<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;


class CategoriaController extends BaseController
{
	protected $helpers = ['form'];
	public function __construct()
	{
		//$this->categortiasModel = new CategoriaModel();
	}

	public function index()
	{
		$categoriasModel = new CategoriaModel();
		$data['categorias'] = $categoriasModel->where('activo', 1)->findAll();
		$this->cargarVistaAdmin('categorias/index', $data);

	}

	public function new()
	{
		$this->cargarVistaAdmin('categorias/nuevo', ['titulo' => 'Agregar Categoria']);
	}

	public function create()
	{
		$reglas = [
			'nombre' => 'required|max_length[50]|is_unique',
		];

		if ($reglas) {
			$data = [
				'nombre' => $this->request->getPost('nombre'),
			];

			$categoriasModel = new CategoriaModel();
			$categoriasModel->insert($data);
			return redirect()->to('admin/categorias/nuevo')->with('success', 'categoria registrada correctamente');
		} else {
			$this->cargarVistaAdmin('Categorias/nuevo', [
				'validaciones' => $this->validator
			]);
		}

	}

	public function edit($id = null)
	{
		if ($id == null) {
			return redirect()->to('categorias');
		}

		$categoriasModel = new CategoriaModel();
		$categoriaID = $categoriasModel->find($id);


		return $this->cargarVistaAdmin('categorias/edita', [
			'titulo' => 'Editar Categoria',
			'categoria' => $categoriaID
		]);
	}

	public function update($id = null)
	{
		$reglas = [
			'nombre' => 'required|max_length[50]',

		];

		if (!$this->validate($reglas)) {
			return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
		}

		$data = [
			'nombre' => $this->request->getPost('nombre')
		];

		$categoriasModel = new CategoriaModel();
		$categoriasModel->update(
			$id,
			$data
		);

		return redirect()->to('admin/categorias');

	}

	public function delete($id)
	{
		$categoriasModel = new CategoriaModel();
		$categoriasModel->update($id, ['activo' => 0]);
		return redirect()->to('admin/categorias');
	}


}

