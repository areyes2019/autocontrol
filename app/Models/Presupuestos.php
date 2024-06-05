<?php

namespace App\Models;

use CodeIgniter\Model;

class Clientes extends Model
{
    protected $table            = 'presupuestos';
    protected $primaryKey       = 'presupuesto_id';
    protected $allowedFields    = [
        'cliente_id',
        'fecha_creacion',
        'validez',
        'total',
    ];

}
