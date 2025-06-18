<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;


class  CategoriaController extends BaseController
{
	 protected $helpers = ['form'];
	 public function __construct()
  {
    //$this->categortiasModel = new CategoriaModel();
  }

	public function index()
	{
		$categoriasModel = new CategoriaModel();
		$data['categorias']= $categoriasModel->findAll();
	
		$this->cargarVistaAdmin('categorias/index', $data);

	}

	public function new()
	{	
		$this->cargarVistaAdmin('categorias/nuevo', ['titulo' => 'Agregar Categoria']);
	}

	public function create()
	{
		$reglas=[
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
		if($id == null){
			return redirect()->to('categorias');
		}

		$categoriasModel = new CategoriaModel();
		$categoriaID = $categoriasModel->find($id);
	

		return $this->cargarVistaAdmin('categorias/edita', [
			'titulo' => 'Editar Categoria',
			'categoria' => $categoriaID]);
	}

	public function update($id = null)
	{
		$reglas=[
			'nombre' => 'required|max_length[50]|is_unique',

		];

		if(!$this->validate($reglas)){
			return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
		}

		$data = [
			'nombre' => $this->request->getPost('nombre')
		];

		$categoriasModel = new CategoriaModel();
		$categoriasModel->update($id, 
			$data
		);

		return redirect()->to('admin/categorias');

	} 

	public function delete($id)
	{
		if(!$this->request->is('delete' || $id == null))
		{
			return redirect()->route('admin/categorias');
		}

		$categoriasModel = new CategoriaModel();
		$categoriasModel -> delete($id);

		return redirect()->to('admin/categorias');
	}


}

