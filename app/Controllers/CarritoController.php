<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\ProductoTalleModel;

class CarritoController extends BaseController
{
    public function index()
    {
        $productoTalleModel = new ProductoTalleModel();
        $productoModel = new ProductoModel();
        $productosCompletos = [];

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


        $this->cargarVista('carrito', [
            'titulo' => 'Carrito',
            'productos' => $productosCompletos
        ]);
    }

    public function agregar()
    {
        $productoTalleModel = new ProductoTalleModel();
        $cantidad = $this->request->getPost('cantidad');
        $talleId = $this->request->getPost('talle_id');
        $talle = $productoTalleModel->find($talleId);
        $productos = session()->get('productos_carrito') ?? [];

        $productoExistente = false;
        foreach ($productos as $index => $item) {
            if ($item['producto_id'] == $talleId) {
                if ($productos[$index]['cantidad'] + $cantidad > $talle['stock']) {
                    return redirect()->back()->with('error', 'La cantidad no puede ser mayor al stock');
                }
                $productos[$index]['cantidad'] += $cantidad;
                $productoExistente = true;
                break;
            }
        }
        if (!$productoExistente) {
            $productos[] = [
                'producto_id' => $talleId,
                'cantidad' => $cantidad,
            ];
        }
        session()->set('productos_carrito', $productos);
        return redirect()->to('/carrito');

    }

    public function vaciarCarrito()
    {
        session()->remove('productos_carrito');
        return redirect()->to('/carrito');
    }

    public function removerDelCarrito($id)
    {
        $productos = session()->get('productos_carrito') ?? [];
        foreach ($productos as $i => $producto) {
            if ($producto['producto_id'] == $id) {
                unset($productos[$i]);
                break;
            }
        }

        $productos = array_values($productos);
        session()->set('productos_carrito', $productos);
        return redirect()->to('/carrito');

    }

}