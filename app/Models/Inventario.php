<?php

namespace App\Models;

use CodeIgniter\Model;

class Inventario extends Model
{
    protected $table            = 'inventario';
    protected $primaryKey       = 'inventario_id';
    protected $allowedFields    = [
        'producto_id',
        'tipo_movimiento',
        'cantidad',
        'fecha',
        'empleado_id'
    ];

}
