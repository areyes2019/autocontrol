<?php

namespace App\Models;

use CodeIgniter\Model;

class Clientes extends Model
{
    protected $table            = 'marcas';
    protected $primaryKey       = 'marca_id';
    protected $allowedFields    = [
        'marca_nombre',
    ];

}
