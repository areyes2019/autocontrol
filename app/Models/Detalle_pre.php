<?php

namespace App\Models;

use CodeIgniter\Model;

class Detalle_pre extends Model
{
    protected $table            = 'detalles_de_presupuesto';
    protected $primaryKey       = 'detalle_presupuesto_id';
    protected $allowedFields    = [
        'presupuesto_id',
        'servicio_id',
        'cantidad',
        'precio_unitario',
        'producto_id',
        'cantidad_producto',
    ];

}
