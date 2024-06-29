<?php

namespace App\Models;

use CodeIgniter\Model;

class Servicios extends Model
{
    protected $table            = 'servicios';
    protected $primaryKey       = 'sercicio_id';
    protected $allowedFields    = [
        'nombre',
        'descripcion',
        'precio_unitario'
    ];

}
