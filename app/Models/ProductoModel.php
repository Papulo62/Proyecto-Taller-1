<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'descripcion', 'imagen', 'precio', 'categoria_id', 'activo', 'marca_id', 'genero'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    public function buscarPorCategoria($categoria_id, $genero)
    {
        return $this->where('categoria_id', $categoria_id)
            ->where('genero', $genero)
            ->findAll();
    }

    public function obtenerUltimosProductos($limite)
    {
        return $this->orderBy('created_at', 'DESC')
            ->limit($limite)
            ->findAll();
    }
}