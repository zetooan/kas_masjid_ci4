<?php

namespace App\Models;

use CodeIgniter\Model;

class DatapenggunaModel extends Model
{

    /* Name of database table */
    protected $table = "tb_datapengguna";

    /* name of primary key field */
    protected $primaryKey = "id";

    /* type of returned data */
    protected $returnType = 'object';

    protected $useTimestamps = true;

    /* default fields that will be inserted */
    protected $allowedFields = ['nama', 'username', 'email', 'password', 'role', 'profil'];

    /* automatic date create in database */
    protected $createdField = "created_at";
    protected $updatedField = "updated_at";
}
