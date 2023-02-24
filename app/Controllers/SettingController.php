<?php

namespace App\Controllers;

use App\Models\HakAksesModel;
use App\Models\SettingModel;
use CodeIgniter\RESTful\ResourceController;

class SettingController extends ResourceController
{
    function __construct()
    {
        /* Loading user modal and session library */
        $this->akses = new HakAksesModel();
        $this->session = \Config\Services::session();
        $this->SettingModel = new SettingModel();
        helper('date');
    }

    public function index()
    {

        if (isset($_SESSION['akses']) && $_SESSION['akses'] == 'admin') {

            $url = 'https://api.myquran.com/v1/sholat/kota/semua';
            $kota = json_decode(file_get_contents($url), true);
            $data = [
                'page' => 'Setting',
                'url' => ['Beranda', 'Admin'],
                'kota' => $kota,
                'setting' => $this->SettingModel->ViewSetting(),

            ];
            return view('pages/admin/setting/form', $data);
        } else {
            return redirect()->to(base_url('beranda'));
        }
    }

    public function Setting()
    {
        if (isset($_SESSION['akses']) && $_SESSION['akses'] == 'admin') {
            $url = 'https://api.myquran.com/v1/sholat/kota/semua';
            $kota = json_decode(file_get_contents($url), true);
            $data = [
                'page' => 'Setting',
                'url' => ['Beranda', 'Admin'],
                'kota' => $kota,
                'setting' => $this->SettingModel->ViewSetting(),
            ];
            return view('pages/admin/setting/form', $data);
        } else {
            return redirect()->to(base_url('beranda'));
        }
    }

    public function UpdateSetting()
    {
        if (isset($_SESSION['akses']) && $_SESSION['akses'] == 'admin') {
            $data = [
                'id' => 1,
                'nama_masjid' => $this->request->getPost('nama_masjid'),
                'id_kota' => $this->request->getPost('id_kota'),
                'alamat' => $this->request->getPost('alamat'),
            ];
            $this->SettingModel->UpdateSetting($data);
            session()->setFlashdata('Pesan', 'Setting berhasil Diupdate !!');
            return redirect()->to(base_url('setting'));
        }
    }
}
