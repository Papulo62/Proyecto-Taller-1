<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class ProductosController extends BaseController
{
  protected $productoModel;

  public function __construct()
  {
    $this->productoModel = new ProductoModel();
  }
  public function index()
  {
    $this->cargarVista('productos', ['titulo' => 'Productos']);
  }

  public function producto()
  {
    $this->cargarVistaAdmin('productos/agregar', ['titulo' => 'Agregar Producto']);
  }

  public function vistaDetalleProducto()
  {
    $this->cargarVista('detalle_producto', ['titulo' => 'Detalle de Producto']);
  }

  public function vistaFavoritos()
  {
    $this->cargarVista('favoritos', ['titulo' => 'Favoritos']);
  }
  public function insertar()
  {
    $validations = $this->validate([
      'nombre' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'El nombre es obligatorio'
        ]
      ],
      'descripcion' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'La descripcion es obligatoria'
        ]
      ],

      'imagen' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'El nombre de la imagen es obligatoria'
        ]
      ],

      'precio' => [
        'rules' => 'required|integer|greater_than[0]',
        'errors' => [
          'required' => 'El precio es obligatorio',
          'integer' => 'El precio debe ser un numero entero',
          'greater_than' => 'El precio debe ser mayor que cero'
        ]
      ],
    ]);

    if ($validations) {
      $data = [
        'nombre' => $this->request->getPost('nombre'),
        'descripcion' => $this->request->getPost('descripcion'),
        'imagen' => $this->request->getPost('imagen'),
        'precio' => $this->request->getPost('precio'),
        'categoria_id' => 1
      ];

      $this->productoModel->insert($data);
      return redirect()->to('admin/productos/agregar')->with('success', 'Producto registrado correctamente');
    } else {
      $this->cargarVistaAdmin('productos/agregar', [
        'validaciones' => $this->validator
      ]);
    }
  }

  public function listar()
  {

  }

  public function editar($id)
  {

  }

  public function actualizar($id)
  {

  }

  public function eliminar($id)
  {

  }

}