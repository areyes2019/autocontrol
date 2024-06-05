<?php

namespace App\Models;

use CodeIgniter\Model;

class Clientes extends Model
{
    protected $table            = 'servicio';
    protected $primaryKey       = 'sercicio_id';
    protected $allowedFields    = [
        'nombre',
        'descripcion',
        'precio_unitario'
    ];

}
