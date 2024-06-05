<?php

namespace App\Models;

use CodeIgniter\Model;

class Clientes extends Model
{
    protected $table            = 'clientes';
    protected $primaryKey       = 'cliente_id';
    protected $allowedFields    = [
        'nombre',
        'apellidos',
        'direccion',
        'telefono',
        'email',
        
    ];

}
