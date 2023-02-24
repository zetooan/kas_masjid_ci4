<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PemasukanKasModel;
use App\Models\PengeluaranKasModel;
use App\Models\KegiatanModel;
use App\Models\ArtikelModel;
use App\Models\SettingModel;

use CodeIgniter\RESTful\ResourceController;

class HomeController extends ResourceController
{
    function __construct()
    {
        /* Loading user modal and session library */
        $this->SettingModel = new SettingModel();
        $this->kegiatan = new KegiatanModel();
        $this->artikel = new ArtikelModel();
        $this->pemasukan = new PemasukanKasModel();
        $this->pengeluaran = new PengeluaranKasModel();
        $this->session = \Config\Services::session();

        helper('date');
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */


    public function home()
    {
        $setting = $this->SettingModel->ViewSetting();
        $url = 'https://api.myquran.com/v1/sholat/jadwal/' . $setting['id_kota'] . '/' . date('Y') . '/' . date('m') . '/' . date('d');
        $waktu = json_decode(file_get_contents($url), true);

        $masuk_sblm = $this->pemasukan->selectSum('jumlah')->find()[0]->jumlah;
        $keluar_sblm = $this->pengeluaran->selectSum('jumlah')->find()[0]->jumlah;
        $akhir = $masuk_sblm - $keluar_sblm;
        $data = [
            'pagekegiatan' => 'Kegiatan',
            'pageartikel' => 'Artikel',
            'pagekas' => 'Rekap Kas',
            'kegiatan' => $this->kegiatan->select(['tanggal', 'keterangan', 'pj'])->find(),
            'artikel' => $this->artikel
                ->select(['tb_datapengguna.nama', 'tb_artikel.id', 'tb_artikel.gambar', 'tb_artikel.judul', 'tb_artikel.updated_at', 'tb_artikel.konten'])
                ->join('tb_datapengguna', 'tb_artikel.penulis  = tb_datapengguna.id')
                ->find(),
            // kas
            'akhir' => $akhir,
            'setting' => $this->SettingModel->ViewSetting(),
            'waktu' => $waktu,
        ];


        return view('pages/user/home', $data);
    }

    public function profile()
    {
        $setting = $this->SettingModel->ViewSetting();
        $data = [
            'setting' => $this->SettingModel->ViewSetting(),
        ];
        return view('pages/user/profile', $data);
    }

    public function manajemen()
    {
        $setting = $this->SettingModel->ViewSetting();
        $data = [
            'setting' => $this->SettingModel->ViewSetting(),
        ];
        return view('pages/user/manajemen', $data);
    }

    public function blog()
    {
        $data = [
            'artikel' => $this->artikel
                ->select(['tb_datapengguna.nama', 'tb_artikel.id', 'tb_artikel.gambar', 'tb_artikel.judul', 'tb_artikel.updated_at', 'tb_artikel.konten'])
                ->join('tb_datapengguna', 'tb_artikel.penulis  = tb_datapengguna.id')
                ->find(),
            'setting' => $this->SettingModel->ViewSetting(),
        ];
        return view('pages/user/blog', $data);
    }

    public function kontak()
    {
        $data = [
            'setting' => $this->SettingModel->ViewSetting(),
        ];
        return view('pages/user/kontak', $data);
    }

    public function post()
    {
        $id = isset($_GET['k']) ? $_GET['k'] : '';
        if (empty($id)) {
            return redirect()->to(base_url('blog'));
        }
        if (filter_var($id, FILTER_VALIDATE_INT) !== false) {
            $data = [
                'artikel' => $this->artikel
                    ->select(['tb_datapengguna.nama', 'tb_artikel.id', 'tb_artikel.gambar', 'tb_artikel.judul', 'tb_artikel.updated_at', 'tb_artikel.konten'])
                    ->join('tb_datapengguna', 'tb_artikel.penulis  = tb_datapengguna.id')
                    ->where('tb_artikel.id = ' . $id)
                    ->first(),
                'setting' => $this->SettingModel->ViewSetting(),
            ];
            return view('pages/user/post', $data);
        } else {
            return redirect()->to(base_url('blog'));
        }
    }
}
