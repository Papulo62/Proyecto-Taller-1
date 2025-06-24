<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoTalleModel extends Model
{
    protected $table = 'producto_talle';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['producto_id', 'talle', 'stock', 'activo'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function desactivarTalles($producto_id)
    {
        return $this->where('producto_id', $producto_id)
            ->set(['activo' => 0])
            ->update();
    }
}