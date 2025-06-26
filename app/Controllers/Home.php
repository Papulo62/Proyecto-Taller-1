<?php

namespace App\Controllers;
use App\Models\CategoriaModel;
use App\Models\ProductoModel;
use App\Models\UsuarioModel;
use App\Models\ProductoTalleModel;

class Home extends BaseController
{
    public function index()
    {
        $productoModel = new ProductoModel();
        $ultimosProductos = $productoModel->where('activo', 1)->obtenerUltimosProductos(6);
        $categoriasModel = new CategoriaModel();
        $categorias = $categoriasModel->where('activo', 1)->findAll();
        $this->cargarVista('inicio', [
            'titulo' => 'Inicio',
            'categorias' => $categorias,
            'productos' => $ultimosProductos
        ]);
    }

    public function vistaCompra()
    {
        $productoTalleModel = new ProductoTalleModel();
        $productoModel = new ProductoModel();
        $productosCompletos = [];
        $metodos = ['Efectivo', 'Mecado pago', 'Tarjeta de credito', 'Tarjeta de debito'];


        $productos = session()->get('productos_carrito') ?? [];
        foreach ($productos as $item) {
            $talle = $productoTalleModel->find($item['producto_id']);
            $producto = $productoModel->find($talle['producto_id']);
            $productosCompletos[] = [
                'nombre' => $producto['nombre'],
                'imagen' => $producto['imagen'],
                'precio' => $producto['precio'],
                'talle' => $talle['talle'],
                'cantidad' => $item['cantidad'],
                'producto_id' => $item['producto_id'],
                'total' => $producto['precio'] * $item['cantidad']
            ];
        }


        $this->cargarVista('compra', [
            'titulo' => 'Compra',
            'productos' => $productosCompletos,
            'metodos' => $metodos

        ]);

    }

    public function vistaUsuario()
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find(session()->get('user_id'));
        $this->cargarVista('usuario_perfil', [
            'titulo' => 'Perfil',
            'usuario' => $usuario
        ]);
    }

    public function vistaContactos()
    {
        $this->cargarVista('contactos', ['titulo' => 'Contacto']);
    }

    public function vistaPreguntasFrecuentes()
    {
        $this->cargarVista('preguntas_frecuentes');
    }

    public function vistaComercializacion()
    {
        $this->cargarVista('comercializacion', ['titulo' => 'Comercializacion']);
    }

    public function vistaTerminos()
    {
        $this->cargarVista('terminos_y_uso', ['titulo' => 'Terminos y Condiciones de Uso']);
    }

    public function vistaSobreNosotros()
    {
        $this->cargarVista('sobre_nosotros', ['titulo' => 'Sobre Nosotros']);
    }
}
