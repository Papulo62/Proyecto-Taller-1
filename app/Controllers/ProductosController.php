<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\CategoriaModel;
use App\Models\MarcaModel;
use App\Models\ProductoTalleModel;

class ProductosController extends BaseController
{
  protected $productoModel;

  public function __construct()
  {
    $this->productoModel = new ProductoModel();
  }
  public function index()
  {
    $producto = $this->productoModel->where('activo', 1)->findAll();
    $categoriaModel = new CategoriaModel();
    $categorias = $categoriaModel->where('activo', 1)->findAll();
    $this->cargarVista('productos', [
      'titulo' => 'Productos',
      'productos' => $producto,
      'categorias' => $categorias

    ]);
  }

  public function buscarPorCategoria($categoria_id = null, $genero = null)
  {
    $productos = $this->productoModel->buscarPorCategoria($categoria_id, $genero);
    $this->cargarVista('productos', [
      'titulo' => 'Productos',
      'productos' => $productos,
      'genero' => $genero
    ]);
  }

  public function producto()
  {
    $marcaModel = new MarcaModel();
    $categoriaModel = new CategoriaModel();
    $categorias = $categoriaModel->where('activo', 1)->findAll();
    $marcas = $marcaModel->where('activo', 1)->findAll();

    $generos = ['Masculino', 'Femenino', 'Niños/as'];

    $this->cargarVistaAdmin('productos/agregar', [
      'titulo' => 'Agregar Producto',
      'categorias' => $categorias,
      'generos' => $generos,
      'marcas' => $marcas
    ]);

  }


  public function vistaDetalleProducto($id)
  {
    $producto = $this->productoModel->find($id);
    $categoriaModel = new CategoriaModel();
    $categorias = $categoriaModel->findAll();
    $productoTalleModel = new ProductoTalleModel();
    $talles = $productoTalleModel->where('producto_id', $id)->findAll();

    if (!$producto) {
      return redirect()->back()->with('error', 'Producto no encontrado');
    }

    return $this->cargarVista('detalle_producto', [
      'titulo' => 'Detalle de producto',
      'producto' => $producto,
      'categorias' => $categorias,
      'talles' => $talles
    ]);

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
        'rules' => 'uploaded[imagen]',
        'errors' => [
          'uploaded' => 'La imagen es obligatoria'
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


      'talle.*' => [
        'rules' => 'required|is_natural',
        'errors' => [
          'required' => 'El talle es obligatorio',
          'is_natural' => 'El numero debe ser natural'
        ]
      ],
      'stock.*' => [
        'rules' => 'required|is_natural',
        'errors' => [
          'required' => 'La cantidad es obligatoria',
          'is_natural' => 'El numero debe ser natural'
        ]
      ],
    ]);

    if ($validations) {
      $imagen = $this->request->getFile('imagen');
      $nuevoNombre = $imagen->getRandomName();
      $imagen->move(FCPATH . 'uploads', $nuevoNombre);
      $data = [
        'nombre' => $this->request->getPost('nombre'),
        'descripcion' => $this->request->getPost('descripcion'),
        'imagen' => $nuevoNombre,
        'precio' => $this->request->getPost('precio'),
        'categoria_id' => $this->request->getPost('categoria'),
        'marca_id' => $this->request->getPost('marca'),
        'genero' => $this->request->getPost('genero')
      ];

      $this->productoModel->insert($data);
      $productoTalleModel = new ProductoTalleModel();

      $productoId = $this->productoModel->getInsertID();
      $talles = $this->request->getPost('talle');
      asort($talles);
      $stocks = $this->request->getPost('stock');

      foreach ($talles as $i => $talle) {
        $data2 = [
          'producto_id' => $productoId,
          'talle' => $talle,
          'stock' => $stocks[$i]
        ];
        $productoTalleModel->insert($data2);
      }

      return redirect()->to('admin/productos/agregar')->with('success', 'Producto registrado correctamente');
    } else {
      $marcaModel = new MarcaModel();
      $categoriaModel = new CategoriaModel();
      $categorias = $categoriaModel->where('activo', 1)->findAll();
      $marcas = $marcaModel->where('activo', 1)->findAll();

      $generos = ['Masculino', 'Femenino', 'Niños/as'];
      $this->cargarVistaAdmin('productos/agregar', [
        'validaciones' => $this->validator,
        'titulo' => 'Agregar Productos',
        'categorias' => $categorias,
        'generos' => $generos,
        'marcas' => $marcas
      ]);
    }
  }

  public function listar()
  {
    $productoTalleModel = new ProductoTalleModel();
    $talles = $productoTalleModel->findAll();
    $productos = $this->productoModel->where('activo', 1)->findAll();
    $this->cargarVistaAdmin('productos/listar', [
      'titulo' => 'Productos',
      'productos' => $productos,
      'talles' => $talles
    ]);

  }

  public function editar($id)
  {
    $producto = $this->productoModel->find($id);

    $productoTalleModel = new ProductoTalleModel();
    $talles = $productoTalleModel->where('producto_id', $id)->findAll();
    $marcaModel = new MarcaModel();
    $categoriaModel = new CategoriaModel();
    $categorias = $categoriaModel->where('activo', 1)->findAll();
    $marcas = $marcaModel->where('activo', 1)->findAll();

    $generos = ['Masculino', 'Femenino', 'Niños/as'];

    if (!$producto) {
      return redirect()->back()->with('error', 'Producto no encontrado');
    }

    return $this->cargarVistaAdmin('productos/actualizar', [
      'titulo' => 'Editar producto',
      'producto' => $producto,
      'talles' => $talles,
      'categorias' => $categorias,
      'generos' => $generos,
      'marcas' => $marcas
    ]);

  }

  public function actualizar($id)
  {

    $productoTalleModel = new ProductoTalleModel();

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

      'precio' => [
        'rules' => 'required|decimal|greater_than[0]',
        'errors' => [
          'required' => 'El precio es obligatorio',
          'decimal' => 'El precio debe ser un numero con decimales',
          'greater_than' => 'El precio debe ser mayor que cero'
        ]
      ],

      'talle.*' => [
        'rules' => 'required|integer',
        'errors' => [
          'required' => 'El talle es obligatorio',
          'integer' => 'El talle debe ser un numero entero',
        ]
      ],
      'stock.*' => [
        'rules' => 'required|integer',
        'errors' => [
          'required' => 'El stock es obligatorio',
          'integer' => 'El stock debe ser un numero entero',
        ]
      ],

    ]);

    if ($validations) {
      $data = [
        'nombre' => $this->request->getPost('nombre'),
        'descripcion' => $this->request->getPost('descripcion'),
        'precio' => $this->request->getPost('precio'),
        'categoria_id' => $this->request->getPost('categoria'),
        'genero' => $this->request->getPost('genero'),
        'marca_id' => $this->request->getPost('marca'),
      ];
      $imagen = $this->request->getFile('imagen');
      if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
        $allowedTypes = ['image/jpeg', 'image/png'];
        if (in_array($imagen->getMimeType(), $allowedTypes)) {
          $nuevoNombre = $imagen->getRandomName();
          $imagen->move(FCPATH . 'uploads', $nuevoNombre);
          $data['imagen'] = $nuevoNombre;
        }
      }

      $this->productoModel->update($id, $data);

      $talles = $this->request->getPost('talle');
      $stocks = $this->request->getPost('stock');
      $tallesId = $this->request->getPost('talle_id');

      $idsActuales = $productoTalleModel->where('producto_id', $id)->findColumn('id');

      $idsBorrar = array_diff($idsActuales, $tallesId);
      foreach ($idsBorrar as $borrarId) {
        $productoTalleModel->delete($borrarId);
      }

      foreach ($talles as $i => $talle) {
        if (isset($tallesId[$i])) {
          $productoTalleModel->update($tallesId[$i], [
            'talle' => $talle,
            'stock' => $stocks[$i]
          ]);

        } else {
          $productoTalleModel->insert([
            'producto_id' => $id,
            'talle' => $talle,
            'stock' => $stocks[$i]
          ]);
        }
      }
      return redirect()->to('admin/productos')->with('success', 'Producto actualizado correctamente');
    } else {

      $producto = $this->productoModel->find($id);
      $talles = $productoTalleModel->where('producto_id', $id)->findAll();
      $marcaModel = new MarcaModel();
      $categoriaModel = new CategoriaModel();
      $categorias = $categoriaModel->where('activo', 1)->findAll();
      $marcas = $marcaModel->where('activo', 1)->findAll();

      $generos = ['Masculino', 'Femenino', 'Niños/as'];

      return $this->cargarVistaAdmin('productos/actualizar', [
        'validaciones' => $this->validator,
        'producto' => $producto,
        'talles' => $talles,
        'categorias' => $categorias,
        'generos' => $generos,
        'marcas' => $marcas,
        'titulo' => 'Actualizar Producto'
      ]);
    }
  }


  public function eliminar($id)
  {
    $productoTalleModel = new ProductoTalleModel();
    $this->productoModel->update($id, ['activo' => 0]);
    $productoTalleModel->desactivarTalles($id);
    return redirect()->to('admin/productos');
  }

}