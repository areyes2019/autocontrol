<?php

namespace App\Models;

use CodeIgniter\Model;

class Ordenes extends Model
{
    protected $table            = 'ordenes_de_trabajo';
    protected $primaryKey       = 'orden_id';
    protected $allowedFields    = [
        'fecha_ingreso',
        'fecha_salida',
        'vehiculo_id',
        'cliente_id',
        'empleado_id',
        'mecanico_id',
    ];

}
