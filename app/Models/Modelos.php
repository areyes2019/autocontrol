<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelos extends Model
{
    protected $table            = 'modelos';
    protected $primaryKey       = 'modelo_id';
    protected $allowedFields    = ['modelo'];

}
