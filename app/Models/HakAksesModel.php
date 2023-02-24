<?php

namespace App\Models;

use CodeIgniter\Model;

class HakAksesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_hakakses';
    protected $primaryKey       = 'id';
    protected $returnType = 'object';
}
