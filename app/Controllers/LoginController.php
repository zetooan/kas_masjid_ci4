<?php

namespace App\Controllers;

use App\Models\DatapenggunaModel;
use App\Models\HakAksesModel;
use App\Models\SettingModel;
use App\Controllers\BaseController;

class LoginController extends BaseController
{
    function __construct()
    {
        /* Loading user modal and session library */
        $this->DatapenggunaModel = new DatapenggunaModel();
        $this->SettingModel = new SettingModel();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $setting = $this->SettingModel->ViewSetting();
        $data = [
            'validation' => \Config\Services::validation(),
            'setting' => $this->SettingModel->ViewSetting(),
        ];
        return view('pages/admin/login/login', $data);
    }
    public function login()
    {
        if (!$this->validate([
            'username' => 'required',
            'password' => 'required'
        ])) {
            $this->session->setFlashdata('message', "username dan password harus diisi");
            return redirect()->to(base_url('login'));
        } else {
            $username = strtolower($this->request->getVar('username'));
            $password = $this->request->getVar('password');
            $data = $this->DatapenggunaModel->where('username', $username)->first();
            if (isset($data) && password_verify($password, $data->password)) {
                $masuk = $this->DatapenggunaModel->select(['tb_datapengguna.id', 'tb_datapengguna.username', 'tb_datapengguna.nama', 'tb_datapengguna.email', 'tb_datapengguna.profil', 'tb_hakakses.akses'])->join('tb_hakakses', 'tb_datapengguna.role = tb_hakakses.id')->where('username', $username)->first();
                $login = [
                    'id' => $masuk->id,
                    'username' =>  $masuk->username,
                    'nama' =>  $masuk->nama,
                    'email' =>  $masuk->email,
                    'akses' =>  $masuk->akses,
                    'profil' =>  $masuk->profil,

                ];
                $this->session->set($login);
                $this->session->setFlashdata('Pesan', "Selamat datang kembali" . $username);
                return redirect()->to(base_url('/'));
            } else {
                $this->session->setFlashdata('Pesan', "Kombinasi Username dan Password anda salah");
                return redirect()->to(base_url('login'));
            }
        }
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('/'));
    }
}
