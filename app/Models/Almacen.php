<?php

namespace App\Models;

use CodeIgniter\Model;

class Almacen extends Model
{
    protected $table            = 'almacen';
    protected $primaryKey       = 'producto_id';
    protected $allowedFields    = [
        'nombre',
        'descripcion',
        'marca',
        'precio_compra',
        'precio_venta'
        
    ];

}
