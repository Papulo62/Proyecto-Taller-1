<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MarcaModel;


class  MarcaController extends BaseController
{
	protected $marcaModel;
	 protected $helpers = ['form'];

	 public function __construct()
  {
    $this->marcaModel = new MarcaModel();
  }

	public function index()
	{
		$marcaModel = new MarcaModel();
		$data['marcas'] = $marcaModel->findAll();

		$this->cargarVistaAdmin('marcas/index', $data);
	}

	public function new()
	{	
		$this->cargarVistaAdmin('marcas/nuevo', ['titulo' => 'Agregar Categoria']);
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

			$marcaModel = new MarcaModel();
			$marcaModel->insert($data);
      return redirect()->to('admin/marcas')->with('success', 'Marca registrada correctamente');
    } else {
      $this->cargarVistaAdmin('/admin/marcas/nuevo', [
        'validaciones' => $this->validator
      ]);
    }
	} 

	public function edit($id = null)
	{
		if($id == null){
			return redirect()->to('admin/marca');
		}

		$marcaModel = new MarcaModel();
		$categoriaID = $marcaModel->find($id);

		return $this -> cargarVistaAdmin('marcas/editar', [
			'titulo' => 'Editar Marca',
			'Marcas' => $categoriaID
		]);
	}

	public function update($id = null)
	{
		if( $id == null){
			return redirect()->to('/admin/marcas');
		}

		$reglas=[
			'nombre' => 'required|max_length[50]|is_unique',

		];

		if(!$this->validate($reglas)){
			return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
		}

		$data =
		[ 
			'nombre' =>	$this->request->getPost(['nombre'])
		];

		$marcaModel = new MarcaModel();
		$marcaModel->update($id, $data);

		return redirect()->to('admin/marcas');

	} 

	public function delete($id)
	{
		if( $id == null)
		{
			return redirect()->route('admin/marcas');
		}

		$marcaModel = new MarcaModel();
		$marcaModel -> delete($id);

		return redirect()->to('admin/marcas');
	}

}