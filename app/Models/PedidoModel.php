<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['usuario_id', 'total', 'metodo_pago', 'dni', 'localidad', 'direccion', 'codigo_postal', 'altura'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getPedidosConDetalles($pedido_id)
    {
        return $this->agregarJoins()->where('pedido.id', $pedido_id)
            ->orderBy('pedido.created_at', 'DESC')
            ->orderBy('dp.id', 'ASC')->get();


    }
    public function getPedidosConDetallesDeUsuario($usuarioId)
    {
        return $this->agregarJoins()
            ->where('pedido.usuario_id', $usuarioId)
            ->orderBy('pedido.created_at', 'DESC')
            ->orderBy('dp.id', 'ASC')->get();

    }

    private function agregarJoins()
    {
        return $this->select('
                pedido.id as pedido_id,
                pedido.usuario_id,
                pedido.total as pedido_total,
                pedido.metodo_pago,
                pedido.created_at,
                dp.id as detalle_id,
                pr.precio,
                dp.cantidad,
                dp.subtototal,
                pr.nombre as producto_nombre,
                pr.imagen,
                pt.talle
            ')
            ->join('detalle_pedido dp', 'dp.pedido_id = pedido.id')
            ->join('producto_talle pt', 'pt.id = dp.producto_talle_id')
            ->join('producto pr', 'pr.id = pt.producto_id');
    }

    public function findAllWithUser()
    {
        return $this->select('pedido.*, usuario.nombre as nombre_usuario')
            ->join('usuario', 'usuario.id = pedido.usuario_id', 'left')
            ->findAll();
    }
}
