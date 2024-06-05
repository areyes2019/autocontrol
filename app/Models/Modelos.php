<?php

namespace App\Models;

use CodeIgniter\Model;

class Clientes extends Model
{
    protected $table            = 'modelos';
    protected $primaryKey       = 'modelo_id';
    protected $allowedFields    = ['modelo'];

}
