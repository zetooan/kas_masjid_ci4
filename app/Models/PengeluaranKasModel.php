<?php

namespace App\Models;

use CodeIgniter\Model;

class PengeluaranKasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_pengeluaran';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['tanggal', 'ket', 'jumlah'];
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    function checkDateFormat($date)
    {
        $tgl = explode("-", $date);
        if (count(array_filter($tgl, 'ctype_digit')) == 3) {

            if (checkdate($tgl[1], $tgl[2], $tgl[0]))
                return true;
            else
                return false;
        } else
            return false;
    }
}
