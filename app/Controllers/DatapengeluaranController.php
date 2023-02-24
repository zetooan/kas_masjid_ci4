<?php

namespace App\Controllers;

use App\Models\PengeluaranKasModel;
use CodeIgniter\RESTful\ResourceController;

class DatapengeluaranController extends ResourceController
{
    function __construct()
    {
        /* Loading user modal and session library */
        $this->pengeluaran = new PengeluaranKasModel();
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

            $dari = (isset($_GET['dari']) && $this->pengeluaran->checkDateFormat($_GET['dari'])) ? $_GET['dari'] : date('Y-m-d', strtotime("-30 day", strtotime(date("Y-m-d"))));
            $sampai = (isset($_GET['sampai']) && $this->pengeluaran->checkDateFormat($_GET['dari'])) ? $_GET['sampai'] : date('Y-m-d');
            if ($dari >= $sampai) {
                $temp = $dari;
                $dari = $sampai;
                $sampai = $temp;
            }
            $data = [
                'page' => 'Pengeluaran',
                'url' => ['Beranda', 'Kas'],
                'sebagai' => $this->sebagai,
                'periode' => ['awal' => $dari, 'akhir' => $sampai],
                'kas' => $this->pengeluaran->select(['id', 'tanggal', 'ket', 'jumlah'])->where('tanggal BETWEEN "' . date('Y-m-d', strtotime($dari)) . '" and "' . date('Y-m-d', strtotime($sampai)) . '"')->find(),
                'jumlah' => $this->pengeluaran->selectSum('jumlah')->where('tanggal BETWEEN "' . date('Y-m-d', strtotime($dari)) . '" and "' . date('Y-m-d', strtotime($sampai)) . '"')->find()[0]->jumlah,
            ];
            return view('pages/admin/kas/list', $data);
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
        return redirect()->to(base_url('pengeluaran'));
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
                'page' => 'Tambah Pengeluaran',
                'url' => ['Beranda', 'Kas', 'Pengeluaran'],
                'validation' => \Config\Services::validation()
            ];

            return view('pages/admin/kas/form', $data);
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
                'ket' => [
                    'rules' => 'required|max_length[255]|min_length[3]',
                    'errors' => [
                        'required' => '{field} harus terisi',
                        'max_length' => '{field} maximal 255 karakter',
                        'min_length' => '{field} minimal 3 karakter',
                    ]
                ],
                'jumlah' => [
                    'rules' => 'is_natural_no_zero|required|numeric',
                    'errors' => [
                        'is_natural_no_zero' => '{field} tidak boleh 0',
                        'required' => '{field} tidak boleh kosong',
                        'numeric' => '{field} harus berupa angka'
                    ]
                ],
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to(base_url('pengeluaran/new'))->withInput()->with('validasi', $validation);
            } else {
                if ($this->pengeluaran->save([
                    'tanggal' => $this->request->getVar('tanggal'),
                    'ket' => $this->request->getVar('ket'),
                    'jumlah' => $this->request->getVar('jumlah'),
                ])) {
                    $this->session->setFlashdata('message_succees', "Berhasil menambahkan data pengeluaran kas!");
                    return redirect()->to(base_url('pengeluaran'));
                } else {
                    $this->session->setFlashdata('message_fail', "Server error gagal menambahkan data pengeluaran kas");
                    return redirect()->to(base_url('pengeluaran'));
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
                'page' => 'Edit Pengeluaran',
                'url' => ['Beranda', 'Kas', 'Pengeluaran'],
                'validation' => \Config\Services::validation(),
                'isi' => $this->pengeluaran->getWhere(['id' => $id])->resultID->fetch_assoc()
            ];

            return view('pages/admin/kas/form', $data);
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
                'ket' => [
                    'rules' => 'required|max_length[255]|min_length[3]',
                    'errors' => [
                        'required' => '{field} harus terisi',
                        'max_length' => '{field} maximal 255 karakter',
                        'min_length' => '{field} minimal 3 karakter',

                    ]
                ],
                'jumlah' => [
                    'rules' => 'is_natural_no_zero|required|numeric',
                    'errors' => [
                        'is_natural_no_zero' => '{field} tidak boleh 0',
                        'required' => '{field} tidak boleh kosong',
                        'numeric' => '{field} harus berupa angka'
                    ]
                ],
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to(base_url('pengeluaran/new'))->withInput()->with('validasi', $validation);
            } else {
                if ($this->pengeluaran->save([
                    'id' => $id,
                    'tanggal' => $this->request->getVar('tanggal'),
                    'ket' => $this->request->getVar('ket'),
                    'jumlah' => $this->request->getVar('jumlah'),
                ])) {
                    $this->session->setFlashdata('message_succees', "Berhasil mengupdate data pengeluaran kas!");
                    return redirect()->to(base_url('pengeluaran'));
                } else {
                    $this->session->setFlashdata('message_fail', "Server error gagal mengupdate data pengeluaran kas");
                    return redirect()->to(base_url('pengeluaran'));
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

            if ($this->pengeluaran->delete($id)) {
                $this->session->setFlashdata('message_succees', "Success, deleted data!");
                return redirect()->to(base_url('pengeluaran'));
            } else {
                $this->session->setFlashdata('message_fail', "Can't, deleted data!");
                return redirect()->to(base_url('pengeluaran'));
            }
        } else {
            return redirect()->to(base_url('beranda'));
        }
    }
}
