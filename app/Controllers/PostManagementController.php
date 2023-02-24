<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use CodeIgniter\RESTful\ResourceController;

class PostManagementController extends ResourceController
{
    function __construct()
    {
        /* Loading user modal and session library */
        $this->artikel = new ArtikelModel();
        $this->session = \Config\Services::session();
        helper('date');
        helper('form');
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'anggota')) {
            $id = $_SESSION['id'];
            $data = [
                'page' => 'Artikel Management',
                'url' => ['Beranda', 'Postingan'],
                'gambar' => $this->artikel->getGambar(),
                'artikel' => $this->artikel
                    ->select(['tb_artikel.id', 'tb_artikel.gambar', 'tb_artikel.judul', 'tb_artikel.updated_at'])
                    ->find(),
            ];
            return view('pages/admin/artikel-management/list', $data);
        } else {
            return redirect()->to(base_url('beranda'));
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new ArtikelModel();
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'anggota')) {

            $data = [
                'page' => 'Show Artikel',
                'url' => ['Beranda', 'Postingan', 'Artikel'],
                'validation' => \Config\Services::validation(),
                'isi' => $this->artikel
                    ->select(['tb_datapengguna.nama', 'tb_artikel.gambar', 'tb_artikel.judul', 'tb_artikel.updated_at', 'tb_artikel.konten'])
                    ->join('tb_datapengguna', 'tb_artikel.penulis  = tb_datapengguna.id')
                    ->where('tb_artikel.id = ' . $id)
                    ->first()
            ];
            return view('pages/admin/artikel-management/preview', $data);
        } else {
            return redirect()->to(base_url('beranda'));
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin')) {
            $data = $this->artikel->where('id = ' . $id)->first();
            if ($data->gambar != null) {
                $target_file = '../public/assets/images/' . $data->gambar;
                unlink($target_file);
            }
            if ($this->artikel->delete($id)) {
                $this->session->setFlashdata('message_succees', "Success, deleted data!");
                return redirect()->to(base_url('artikel-management'));
            } else {
                $this->session->setFlashdata('message_fail', "Can't, deleted data!");
                return redirect()->to(base_url('artikel-management'));
            }
        } else {
            return redirect()->to(base_url('beranda'));
        }
    }
}
