<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use CodeIgniter\RESTful\ResourceController;

class ArtikelController extends ResourceController
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
                'page' => 'Artikel',
                'url' => ['Beranda', 'Postingan'],
                'gambar' => $this->artikel->getGambar(),
                'artikel' => $this->artikel
                    ->select(['tb_artikel.id', 'tb_artikel.gambar', 'tb_artikel.judul', 'tb_artikel.updated_at'])
                    ->join('tb_datapengguna', 'tb_artikel.penulis  = tb_datapengguna.id')
                    ->where('tb_artikel.penulis = ' . $id)
                    ->find(),
            ];
            return view('pages/admin/artikel/list', $data);
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
            return view('pages/admin/artikel/preview', $data);
        } else {
            return redirect()->to(base_url('beranda'));
        }


        // return redirect()->to(base_url('artikel'));
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'anggota')) {

            $data = [
                'page' => 'Tambah Artikel',
                'url' => ['Beranda', 'Postingan', 'Artikel'],
                'validation' => \Config\Services::validation(),
                'target' => 'artikel'
            ];

            return view('pages/admin/artikel/form', $data);
        } else {
            return redirect()->to(base_url('beranda'));
        }
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'anggota')) {

            if (!$this->validate([
                'judul' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus terisi',
                    ]
                ],
                'file_upload' => [
                    'rules' => 'mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,100000]',
                ],
                'konten' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus terisi',
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to(base_url('artikel/' . '$id' . '/show'))->withInput()->with('validasi', $validation);
            } else {
                $penulis = $_SESSION['id'];
                $upload = $this->request->getFile('file_upload');
                if ($upload->getName() != null) {
                    $upload->move(WRITEPATH . '../public/assets/images/');
                    $uploadgb = $upload->getName();
                } else {
                    $uploadgb = '';
                }
                if ($this->artikel->save([
                    'penulis'  => $penulis,
                    'judul'  => $this->request->getPost('judul'),
                    'gambar' => $uploadgb,
                    'konten'  => $this->request->getPost('konten'),
                ])) {
                    $this->session->setFlashdata('message_succees', "Berhasil mengupdate data artikel!");
                    return redirect()->to(base_url('artikel'));
                } else {
                    $this->session->setFlashdata('message_fail', "Server error gagal mengupdate data artikel");
                    return redirect()->to(base_url('artikel'));
                }
            }
        } else {
            return redirect()->to(base_url('beranda'));
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'anggota')) {

            $data = [
                'page' => 'Edit Artikel',
                'url' => ['Beranda', 'Postingan', 'Artikel'],
                'validation' => \Config\Services::validation(),
                'isi' => $this->artikel
                    ->where('id = ' . $id)
                    ->first(),
                'target' => 'artikel/' . $id
            ];

            return view('pages/admin/artikel/form', $data);
        } else {
            return redirect()->to(base_url('beranda'));
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new ArtikelModel();
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'anggota')) {

            //validasi create user
            if (!$this->validate([
                'judul' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus terisi',
                    ]
                ],
                'file_upload' => [
                    'rules' => 'mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,100000]',
                ],
                'konten' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus terisi',
                    ]
                ],
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to(base_url('artikel/new'))->withInput()->with('validasi', $validation);
            } else {
                $gambar_lama = $this->artikel
                    ->where('id = ' . $id)
                    ->first()
                    ->gambar;
                $penulis = $_SESSION['id'];
                $upload = $this->request->getFile('file_upload');
                if ($upload->getName() != null) {
                    $upload->move(WRITEPATH . '../public/assets/images/');
                    $uploadgb = $upload->getName();

                    if (!empty($gambar_lama) && isset($gambar_lama)) {
                        $target_file = '../public/assets/images/' . $gambar_lama;
                        unlink($target_file);
                    }
                } else {
                    $uploadgb = $gambar_lama;
                }
                if ($this->artikel->save([
                    'id' => $id,
                    'penulis'  => $penulis,
                    'judul'  => $this->request->getPost('judul'),
                    'gambar' => $uploadgb,
                    'konten'  => $this->request->getPost('konten'),
                ])) {
                    $this->session->setFlashdata('message_succees', "Berhasil menambahkan data artikel!");
                    return redirect()->to(base_url('artikel'));
                } else {
                    $this->session->setFlashdata('message_fail', "Server error gagal menambahkan data artikel");
                    return redirect()->to(base_url('artikel'));
                }
            }
        } else {
            return redirect()->to(base_url('beranda'));
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'anggota')) {
            $data = $this->artikel->where('id = ' . $id)->first();
            if ($data->gambar != null) {
                $target_file = '../public/assets/images/' . $data->gambar;
                unlink($target_file);
            }
            if ($this->artikel->delete($id)) {
                $this->session->setFlashdata('message_succees', "Success, deleted data!");
                return redirect()->to(base_url('artikel'));
            } else {
                $this->session->setFlashdata('message_fail', "Can't, deleted data!");
                return redirect()->to(base_url('artikel'));
            }
        } else {
            return redirect()->to(base_url('beranda'));
        }
    }
    public function proses()
    {
        $model = new ArtikelModel();
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('/');
        }
        $validation = $this->validate([
            'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
        ]);

        if ($validation == FALSE) {
            return $this->index();
        } else {
            $upload = $this->request->getFile('file_upload');
            $upload->move(WRITEPATH . '../public/assets/images/');
            $data = array(
                'penulis'  => $this->request->getPost('penulis'),
                'judul'  => $this->request->getPost('judul'),
                'gambar' => $upload->getName(),
                'konten'  => $this->request->getPost('konten'),
            );
            $model->simpan_gambar($data);
            return redirect()->to('./artikel')->with('berhasil', 'Data Berhasil di Simpan');
        }
    }
}
