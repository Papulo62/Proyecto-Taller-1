<?php

namespace App\Controllers;

use App\Models\PedidoModel;
use App\Models\ProductoTalleModel;
use App\Models\ProductoModel;
use App\Models\DetallePedidoModel;

class CompraController extends BaseController
{
    public function registrarVenta()
    {

        $validation = \Config\Services::validation();

        $rules = [
            'metodo_pago' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        $productosCarrito = session()->get('productos_carrito') ?? [];

        if (empty($productosCarrito)) {
            return redirect()->to('/carrito')
                ->with('error', 'El carrito está vacío');
        }

        $productoTalleModel = new ProductoTalleModel();
        $productoModel = new ProductoModel();
        $pedidoModel = new PedidoModel();
        $detallePedidoModel = new DetallePedidoModel();

        $usuarioId = session()->get('user_id');
        $metodoPago = $this->request->getPost('metodo_pago');

        $total = 0;
        $detallesVenta = [];

        foreach ($productosCarrito as $item) {
            $productoTalleId = $item['producto_id'];
            $cantidad = $item['cantidad'];
            $productoTalle = $productoTalleModel->find($productoTalleId);
            $producto = $productoModel->find($productoTalle['producto_id']);

            if ($productoTalle['stock'] < $cantidad) {
                return redirect()->back()
                    ->with('error', 'Stock insuficiente para el producto: ' . $producto['nombre'] . ' talle ' . $productoTalle['talle']);
            }

            $precioUnitario = (float) $producto['precio'];
            $subtotal = $cantidad * $precioUnitario;
            $total += $subtotal;

            $detallesVenta[] = [
                'producto_talle_id' => $productoTalleId,
                'cantidad' => $cantidad,
                'precio_unitario' => $precioUnitario,
                'subtototal' => $subtotal
            ];
        }

        $data = [
            'usuario_id' => $usuarioId,
            'total' => $total,
            'metodo_pago' => $metodoPago
        ];

        $pedidoId = $pedidoModel->insert($data);

        foreach ($detallesVenta as $detalle) {
            $detalle['pedido_id'] = $pedidoId;
            $detallePedidoModel->insert($detalle);
        }


        foreach ($productosCarrito as $item) {
            $productoTalleId = $item['producto_id'];
            $cantidad = $item['cantidad'];

            $productoTalleModel->set('stock', 'stock - ' . $cantidad, false)
                ->where('id', $productoTalleId)
                ->update();
        }

        session()->remove('productos_carrito');

        return redirect()->to('/pedido/confirmacion/' . $pedidoId)
            ->with('success', 'Venta registrada exitosamente');
    }

    public function listar()
    {
        $pedidoModel = new PedidoModel();
        $pedidos = $pedidoModel->findAll();
        $this->cargarVistaAdmin('ventas/listar', [
            'pedidos' => $pedidos
        ]);
    }
}