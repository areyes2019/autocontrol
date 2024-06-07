<?php

namespace App\Models;

use CodeIgniter\Model;

class Empleados extends Model
{
    protected $table            = 'empleados';
    protected $primaryKey       = 'empleado_id';
    protected $allowedFields    = [
        'nombre',
        'apellidos',
        'direccion',
        'telefono',
        'email',
        'cargo',
        'salario',
        
    ];

}
