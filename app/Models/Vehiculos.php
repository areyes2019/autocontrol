<?php

namespace App\Models;

use CodeIgniter\Model;

class Vehiculos extends Model
{
    protected $table            = 'vehiculos';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'vehiculo_id',
        'marca',
        'modelo',
        'matricula',
        'cliente_id',
    ];

}
