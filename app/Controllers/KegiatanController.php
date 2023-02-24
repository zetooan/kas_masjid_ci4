<?php

namespace App\Controllers;

use App\Models\KegiatanModel;
use CodeIgniter\RESTful\ResourceController;

class KegiatanController extends ResourceController
{
    function __construct()
    {
        /* Loading user modal and session library */
        $this->kegiatan = new KegiatanModel();
        $this->session = \Config\Services::session();
        $this->sebagai = ['', 'Anggota', 'Bendahara', 'Admin'];
        helper('date');
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'bendahara')) {

            $dari = (isset($_GET['dari']) && $this->kegiatan->checkDateFormat($_GET['dari'])) ? $_GET['dari'] : date('Y-m-d', strtotime("+30 day", strtotime(date("Y-m-d"))));
            $sampai = (isset($_GET['sampai']) && $this->kegiatan->checkDateFormat($_GET['dari'])) ? $_GET['sampai'] : date('Y-m-d');
            if ($dari >= $sampai) {
                $temp = $dari;
                $dari = $sampai;
                $sampai = $temp;
            }
            $data = [
                'page' => 'Kegiatan',
                'url' => ['Beranda', 'Postingan'],
                'periode' => ['awal' => $dari, 'akhir' => $sampai],
                'kegiatan' => $this->kegiatan->select(['id', 'tanggal', 'keterangan', 'pj'])
                    ->where('tanggal BETWEEN "' . date('Y-m-d', strtotime($dari)) . '" and "' . date('Y-m-d', strtotime($sampai)) . '"')->find(),

            ];
            return view('pages/admin/kegiatan/list', $data);
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
        return redirect()->to(base_url('kegiatan'));
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'bendahara')) {

            $data = [
                'page' => 'Tambah Kegiatan',
                'url' => ['Beranda', 'Postingan', 'Kegiatan'],
                'validation' => \Config\Services::validation()
            ];

            return view('pages/admin/kegiatan/form', $data);
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
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'bendahara')) {

            //validasi create user
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required|valid_date[Y-m-d]',
                    'errors' => [
                        'required' => '{field} harus terisi',
                        'valid_date' => '{field} harus berupa tanggal'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus terisi',
                    ]
                ],
                'pj' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus terisi',
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to(base_url('kegiatan/new'))->withInput()->with('validasi', $validation);
            } else {
                if ($this->kegiatan->save([
                    'tanggal' => $this->request->getVar('tanggal'),
                    'keterangan' => $this->request->getVar('keterangan'),
                    'pj' => $this->request->getVar('pj'),
                ])) {
                    $this->session->setFlashdata('message_succees', "Berhasil menambahkan data kegiatan!");
                    return redirect()->to(base_url('kegiatan'));
                } else {
                    $this->session->setFlashdata('message_fail', "Server error gagal menambahkan data kegiatan");
                    return redirect()->to(base_url('kegiatan'));
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
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'bendahara')) {

            $data = [
                'page' => 'Edit Kegiatan',
                'url' => ['Beranda', 'Postingan', 'Kegiatan'],
                'validation' => \Config\Services::validation(),
                'isi' => $this->kegiatan->getWhere(['id' => $id])->resultID->fetch_assoc()
            ];

            return view('pages/admin/kegiatan/form', $data);
        } else {
            return redirect()->to(base_url('beranda'));
        }
    }

    public function tampil($id = null)
    {
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'bendahara')) {

            $data = [
                'pagekegiatan' => 'Kegiatan',
                'kegiatan' => $this->kegiatan->select(['id', 'tanggal', 'keterangan', 'pj'])->find(),
                'url' => ['Beranda', 'Postingan', 'Kegiatan'],
                'validation' => \Config\Services::validation(),
                'isi' => $this->kegiatan->getWhere(['id' => $id])->resultID->fetch_assoc()
            ];

            return view('pages/admin/kegiatan/form', $data);
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
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'bendahara')) {

            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required|valid_date[Y-m-d]',
                    'errors' => [
                        'required' => '{field} harus terisi',
                        'valid_date' => '{field} harus berupa tanggal'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus terisi',
                    ]
                ],
                'pj' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus terisi',
                    ]
                ],
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to(base_url('kegiatan/new'))->withInput()->with('validasi', $validation);
            } else {
                if ($this->kegiatan->save([
                    'id' => $id,
                    'tanggal' => $this->request->getVar('tanggal'),
                    'keterangan' => $this->request->getVar('keterangan'),
                    'pj' => $this->request->getVar('pj'),
                ])) {
                    $this->session->setFlashdata('message_succees', "Berhasil mengupdate data kegiatan!");
                    return redirect()->to(base_url('kegiatan'));
                } else {
                    $this->session->setFlashdata('message_fail', "Server error gagal mengupdate data kegiatan");
                    return redirect()->to(base_url('kegiatan'));
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
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'bendahara')) {

            if ($this->kegiatan->delete($id)) {
                $this->session->setFlashdata('message_succees', "Success, deleted data!");
                return redirect()->to(base_url('kegiatan'));
            } else {
                $this->session->setFlashdata('message_fail', "Can't, deleted data!");
                return redirect()->to(base_url('kegiatan'));
            }
        } else {
            return redirect()->to(base_url('beranda'));
        }
    }
}
