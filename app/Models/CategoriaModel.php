<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'activo'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false;
}