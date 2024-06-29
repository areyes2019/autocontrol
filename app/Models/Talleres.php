<?php

namespace App\Models;

use CodeIgniter\Model;

class Talleres extends Model
{
    protected $table            = 'talleres';
    protected $primaryKey       = 'id_taller';
    protected $allowedFields    = [
        'nombre_taller',
        'direccion',
        'telefono',
        'correo_electronico',
    ];

}
