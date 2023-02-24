<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    public function ViewSetting()
    {
        return $this->db->table('tb_setting')
            ->where('id', 1)
            ->get()->getRowArray();
    }

    public function UpdateSetting($data)
    {
        $this->db->table('tb_setting')
            ->where('id', 1)
            ->update($data);
    }
}
