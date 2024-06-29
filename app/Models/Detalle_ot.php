<?php

namespace App\Models;

use CodeIgniter\Model;

class Detalle_ot extends Model
{
    protected $table            = 'detalles_de_orden_de_trabajo';
    protected $primaryKey       = 'detalle_orden_id';
    protected $allowedFields    = [
        'orden_id',
        'servicio_id',
        'cantidad',
        'precio_unitario',
        'cantidad_producto'
    ];

}
