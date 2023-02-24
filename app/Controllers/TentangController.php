<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TentangController extends BaseController
{
    public function index()
    {
        if (isset($_SESSION['akses'])) {
            $data = [
                'page' => 'Tentang',
                'url' => ['Beranda', 'Admin'],
            ];
            return view('pages/tentang', $data);
        } else {
            return redirect()->to(base_url('beranda'));
        }
    }
}
