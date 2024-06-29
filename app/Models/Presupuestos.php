<?php

namespace App\Models;

use CodeIgniter\Model;

class Presupuestos extends Model
{
    protected $table            = 'presupuestos';
    protected $primaryKey       = 'presupuesto_id';
    protected $allowedFields    = [
        'cliente_id',
        'slug',
        'fecha_creacion',
        'validez',
        'total',
    ];

}
