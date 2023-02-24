<?php

namespace App\Controllers;

use App\Models\DatapenggunaModel;
use App\Models\HakAksesModel;
use CodeIgniter\RESTful\ResourceController;

class DatapenggunaController extends ResourceController
{
    function __construct()
    {
        /* Loading user modal and session library */
        $this->DatapenggunaModel = new DatapenggunaModel();
        $this->akses = new HakAksesModel();
        $this->session = \Config\Services::session();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        if (isset($_SESSION['akses']) && $_SESSION['akses'] == 'admin') {
            $data = [
                'page' => 'Data Pengguna',
                'url' => ['Beranda', 'Admin'],
                'user' => $this->DatapenggunaModel->select(['tb_datapengguna.id', 'tb_datapengguna.username', 'tb_datapengguna.nama', 'tb_datapengguna.email', 'tb_datapengguna.profil', 'tb_hakakses.akses'])->join('tb_hakakses', 'tb_datapengguna.role = tb_hakakses.id')->findAll(),
            ];
            return view('pages/admin/pengguna/list', $data);
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
        return redirect()->to(base_url('datapengguna'));
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        if (isset($_SESSION['akses']) && $_SESSION['akses'] == 'admin') {
            $data = [
                'page' => 'Tambah Pengguna',
                'url' => ['Beranda', 'Admin', 'Data Pengguna'],
                'sebagai' => $this->akses->findAll(),
                'validation' => \Config\Services::validation()
            ];

            return view('pages/admin/pengguna/form', $data);
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
        if (isset($_SESSION['akses']) && $_SESSION['akses'] == 'admin') {
            //validasi create user
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required|max_length[25]|min_length[3]|alpha_space',
                    'errors' => [
                        'required' => '{field} harus terisi',
                        'max_length' => '{field} maximal 25 karakter',
                        'min_length' => '{field} minimal 3 karakter',
                        'alpha_space' => '{field} hanya berupa huruf dan spasi'
                    ]
                ],
                'username' => [
                    'rules' => 'required|max_length[25]|min_length[3]|is_unique[tb_datapengguna.username]|alpha_numeric',
                    'errors' => [
                        'required' => '{field} harus terisi',
                        'max_length' => '{field} maximal 25 karakter',
                        'min_length' => '{field} minimal 3 karakter',
                        'is_unique' => '{field} sudah terpakai',
                        'alpha_numeric' => '{field} hanya berisi alfabet dan angka'
                    ]
                ],
                'email' => [
                    'rules' => 'required|is_unique[tb_datapengguna.email]|valid_email',
                    'errors' => [
                        'required' => '{field} harus terisi',
                        'is_unique' => '{field} sudah terpakai',
                        'valid_email' => '{field} harus benar'
                    ]
                ],
                'role' => [
                    'rules' => 'is_natural_no_zero|required|numeric',
                    'errors' => [
                        'is_natural_no_zero' => 'kolom sebagai harus terisi',
                        'required' => 'kolom sebagai harus terisi',
                        'numeric' => 'kolom sebagai harus angka'
                    ]
                ],
                'password' => [
                    'rules' => 'required|max_length[20]|min_length[8]',
                    'errors' => [
                        'required' => '{field} harus terisi',
                        'max_length' => '{field} maximal 20 karakter',
                        'min_length' => '{field} minimal 8 karakter',
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to(base_url('datapengguna/new'))->withInput()->with('validasi', $validation);
            } else {
                if ($this->DatapenggunaModel->save([
                    'nama' => $this->request->getVar('nama'),
                    'username' => strtolower($this->request->getVar('username')),
                    'email' => $this->request->getVar('email'),
                    'role' => $this->request->getVar('role'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
                ])) {
                    $this->session->setFlashdata('message_succees', "Berhasil menambahkan pengguna!");
                    return redirect()->to(base_url('datapengguna'));
                } else {
                    $this->session->setFlashdata('message_fail', "Server error gagal menambahkan pengguna");
                    return redirect()->to(base_url('datapengguna'));
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
        if (isset($_SESSION['akses']) && $_SESSION['akses'] == 'admin') {
            $data = [
                'page' => 'Edit Pengguna',
                'url' => ['Beranda', 'Admin', 'Data Pengguna'],
                'sebagai' => $this->akses->findAll(),
                'validation' => \Config\Services::validation(),
                'isi' => $this->DatapenggunaModel->getWhere(['id' => $id])->resultID->fetch_assoc()
            ];

            return view('pages/admin/pengguna/form', $data);
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
        if (isset($_SESSION['akses']) && $_SESSION['akses'] == 'admin') {
            $dataLama = $this->DatapenggunaModel->getWhere(['id' => $id])->resultID->fetch_assoc();
            //username
            if ($dataLama['username'] == $this->request->getVar('username')) {
                $rule_username = 'required|max_length[25]|min_length[3]|alpha_numeric';
            } else {
                $rule_username = 'required|max_length[25]|min_length[3]|is_unique[tb_datapengguna.username]|alpha_numeric';
            }
            //email
            if ($dataLama['email'] == $this->request->getVar('email')) {
                $rule_email = 'required|valid_email';
            } else {
                $rule_email = 'required|is_unique[tb_datapengguna.email]|valid_email';
            }
            //password
            if (!empty($this->request->getVar('password'))) {
                $rule_password = 'required|max_length[20]|min_length[8]';
                $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
            } else {
                $rule_password = 'max_length[20]';
                $password = $dataLama['password'];
            }
            //validasi create user
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required|max_length[25]|min_length[3]|alpha_space',
                    'errors' => [
                        'required' => '{field} harus terisi',
                        'max_length' => '{field} maximal 25 karakter',
                        'min_length' => '{field} minimal 3 karakter',
                        'alpha_space' => '{field} hanya berupa huruf dan spasi'
                    ]
                ],
                'username' => [
                    'rules' => $rule_username,
                    'errors' => [
                        'required' => '{field} harus terisi',
                        'max_length' => '{field} maximal 25 karakter',
                        'min_length' => '{field} minimal 3 karakter',
                        'is_unique' => '{field} sudah terpakai',
                        'alpha_numeric' => '{field} hanya berisi alfabet dan angka'
                    ]
                ],
                'email' => [
                    'rules' => $rule_email,
                    'errors' => [
                        'required' => '{field} harus terisi',
                        'is_unique' => '{field} sudah terpakai',
                        'valid_email' => '{field} harus benar'
                    ]
                ],
                'role' => [
                    'rules' => 'is_natural_no_zero|required|numeric',
                    'errors' => [
                        'is_natural_no_zero' => 'kolom sebagai harus terisi',
                        'required' => 'kolom sebagai harus terisi',
                        'numeric' => 'kolom sebagai harus angka'
                    ]
                ],
                'password' => [
                    'rules' => $rule_password,
                    'errors' => [
                        'required' => '{field} harus terisi',
                        'max_length' => '{field} maximal 20 karakter',
                        'min_length' => '{field} minimal 8 karakter',
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to(base_url('datapengguna/' . $id . '/edit'))->withInput()->with('validasi', $validation);
            } else {
                if ($this->DatapenggunaModel->save([
                    'id' => $id,
                    'nama' => $this->request->getVar('nama'),
                    'username' => strtolower($this->request->getVar('username')),
                    'email' => $this->request->getVar('email'),
                    'role' => $this->request->getVar('role'),
                    'password' => $password
                ])) {
                    $this->session->setFlashdata('message_succees', "Berhasil mengupdate pengguna!");
                    return redirect()->to(base_url('datapengguna'));
                } else {
                    $this->session->setFlashdata('message_fail', "Server error gagal mengupdate pengguna");
                    return redirect()->to(base_url('datapengguna'));
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
        if (isset($_SESSION['akses']) && $_SESSION['akses'] == 'admin') {
            if ($this->DatapenggunaModel->delete($id)) {
                $this->session->setFlashdata('message_succees', "Success, Deleted User!");
                return redirect()->to(base_url('datapengguna'));
            } else {
                $this->session->setFlashdata('message_fail', "Can't, Deleted User!");
                return redirect()->to(base_url('datapengguna'));
            }
        } else {
            return redirect()->to(base_url('beranda'));
        }
    }
}
