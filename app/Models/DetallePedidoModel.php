<?php

namespace App\Models;

use CodeIgniter\Model;

class DetallePedidoModel extends Model
{
    protected $table = 'detalle_pedido';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['producto_talle_id', 'pedido_id', 'cantidad', 'subtototal', 'precio_unitario'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}