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
            'dni' => 'required|exact_length[8]|numeric',
            'direccion' => 'required|min_length[5]|max_length[200]',
            'altura' => 'required|numeric|greater_than[0]',
            'localidad' => 'required|min_length[2]|max_length[100]',
            'codigo' => 'required|exact_length[4]|numeric',
            'metodo_pago' => 'required|in_list[Efectivo,Tarjeta de debito,Tarjeta de credito,Mecado pago]'
        ];

        $messages = [
            'dni' => [
                'required' => 'El DNI es obligatorio',
                'exact_length' => 'El DNI debe tener exactamente 8 dígitos',
                'numeric' => 'El DNI debe contener solo números'
            ],
            'direccion' => [
                'required' => 'La dirección es obligatoria',
                'min_length' => 'La dirección debe tener al menos 5 caracteres'
            ],
            'altura' => [
                'required' => 'La altura es obligatoria',
                'numeric' => 'La altura debe ser un número',
                'greater_than' => 'La altura debe ser mayor a 0'
            ],
            'localidad' => [
                'required' => 'La localidad es obligatoria',
                'min_length' => 'La localidad debe tener al menos 2 caracteres'
            ],
            'codigo' => [
                'required' => 'El código postal es obligatorio',
                'exact_length' => 'El código postal debe tener 4 dígitos',
                'numeric' => 'El código postal debe contener solo números'
            ],
            'metodo_pago' => [
                'required' => 'El método de pago es obligatorio',
                'in_list' => 'El método de pago seleccionado no es válido'
            ]
        ];

        $validation->setRules($rules, $messages);

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('validaciones', $this->validator);
        }

        $usuarioId = session()->get('user_id');
        if (!$usuarioId) {
            return redirect()->to('/login')
                ->with('error', 'Debes iniciar sesión para realizar la compra');
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
        $dni = $this->request->getPost('dni');
        $direccion = $this->request->getPost('direccion');
        $altura = $this->request->getPost('altura');
        $localidad = $this->request->getPost('localidad');
        $codigoPostal = $this->request->getPost('codigo');
        $metodoPago = $this->request->getPost('metodo_pago');

        $total = 0;
        $detallesVenta = [];

        foreach ($productosCarrito as $item) {
            $productoTalleId = $item['producto_id'];
            $cantidad = $item['cantidad'];

            $productoTalle = $productoTalleModel->find($productoTalleId);
            if (!$productoTalle) {
                return redirect()->back()
                    ->with('error', 'Producto no encontrado en el sistema');
            }

            $producto = $productoModel->find($productoTalle['producto_id']);
            if (!$producto) {
                return redirect()->back()
                    ->with('error', 'Información del producto no disponible');
            }

            if ($productoTalle['stock'] < $cantidad) {
                return redirect()->back()
                    ->with('error', 'Stock insuficiente para el producto: ' . $producto['nombre'] . ' talle ' . $productoTalle['talle'] . '. Stock disponible: ' . $productoTalle['stock']);
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

        $fechaActual = date('Y-m-d H:i:s');
        $dataPedido = [
            'usuario_id' => $usuarioId,
            'total' => $total,
            'metodo_pago' => $metodoPago,
            'dni' => $dni,
            'direccion' => $direccion,
            'altura' => $altura,
            'localidad' => $localidad,
            'codigo_postal' => $codigoPostal,
            'created_at' => $fechaActual,
        ];


        $pedidoId = $pedidoModel->insert($dataPedido);


        foreach ($detallesVenta as $detalle) {
            $detalle['pedido_id'] = $pedidoId;
            $detalle['created_at'] = $fechaActual;
            $detallePedidoModel->insert($detalle);
        }

        foreach ($productosCarrito as $item) {
            $productoTalleId = $item['producto_id'];
            $cantidad = $item['cantidad'];

            $productoTalleModel->set('stock', 'stock - ' . $cantidad, false)
                ->set('updated_at', $fechaActual)
                ->where('id', $productoTalleId)
                ->update();

        }
        session()->remove('productos_carrito');
        return redirect()->to('carrito')
            ->with('success', 'Venta registrada exitosamente.');

    }

    public function listar()
    {
        $pedidoModel = new PedidoModel();
        $pedidos = $pedidoModel->findAll();
        $pedidos = $pedidoModel->findAllWithUser();
        $this->cargarVistaAdmin('ventas/listar', [
            'pedidos' => $pedidos
        ]);
    }

    public function detallePedido($pedido_id)
    {
        $pedidoModel = new PedidoModel();
        $pedidoDetalles = $pedidoModel->getPedidosConDetalles($pedido_id);
        $totalPedido = $pedidoDetalles->getRowArray()['pedido_total'];
        $this->cargarVistaAdmin('ventas/detalle_pedido', [
            'titulo' => 'Detalle del pedido',
            'detalles' => $pedidoDetalles->getResultArray(),
            'total_pedido' => $totalPedido
        ]);
    }
}