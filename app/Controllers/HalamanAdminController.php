<?php

namespace App\Controllers;

use App\Models\PemasukanKasModel;
use App\Models\PengeluaranKasModel;
use App\Controllers\BaseController;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class HalamanAdminController extends BaseController
{
    function __construct()
    {
        /* Loading user modal and session library */
        $this->pemasukan = new PemasukanKasModel();
        $this->pengeluaran = new PengeluaranKasModel();
        $this->session = \Config\Services::session();
        helper('date');
    }
    public function index()
    {
        if (isset($_SESSION['username'])) {
            return redirect()->to(base_url('rekap'));
        } else {
            $this->session->setFlashdata('message', "Silahkan login terlebih dahulu");
            return redirect()->to(base_url('login'));
        }
    }
    public function rekap()
    {
        if (isset($_SESSION['username'])) {
            $dari = (isset($_GET['dari']) && $this->pengeluaran->checkDateFormat($_GET['dari'])) ? $_GET['dari'] : date('Y-m-d', strtotime("-30 day", strtotime(date("Y-m-d"))));
            $sampai = (isset($_GET['sampai']) && $this->pengeluaran->checkDateFormat($_GET['dari'])) ? $_GET['sampai'] : date('Y-m-d');
            if ($dari >= $sampai) {
                $temp = $dari;
                $dari = $sampai;
                $sampai = $temp;
            }
            $masuk_sblm = $this->pemasukan->selectSum('jumlah')->where('tanggal < "' . $dari . '"')->find()[0]->jumlah;
            $keluar_sblm = $this->pengeluaran->selectSum('jumlah')->where('tanggal < "' . $dari . '"')->find()[0]->jumlah;
            $sblm = $masuk_sblm - $keluar_sblm;
            $data = [
                'page' => 'Rekap Kas',
                'url' => ['Beranda', 'Kas'],
                'sebagai' => $this->sebagai,
                'periode' => ['awal' => $dari, 'akhir' => $sampai],
                'jum_sblm' => $sblm,
                'kas_masuk' => $this->pemasukan->select(['id', 'tanggal', 'ket', 'jumlah'])->where('tanggal BETWEEN "' . date('Y-m-d', strtotime($dari)) . '" and "' . date('Y-m-d', strtotime($sampai)) . '"')->find(),
                'jum_masuk' => $this->pemasukan->selectSum('jumlah')->where('tanggal BETWEEN "' . date('Y-m-d', strtotime($dari)) . '" and "' . date('Y-m-d', strtotime($sampai)) . '"')->find()[0]->jumlah,
                'kas_keluar' => $this->pengeluaran->select(['id', 'tanggal', 'ket', 'jumlah'])->where('tanggal BETWEEN "' . date('Y-m-d', strtotime($dari)) . '" and "' . date('Y-m-d', strtotime($sampai)) . '"')->find(),
                'jum_keluar' => $this->pengeluaran->selectSum('jumlah')->where('tanggal BETWEEN "' . date('Y-m-d', strtotime($dari)) . '" and "' . date('Y-m-d', strtotime($sampai)) . '"')->find()[0]->jumlah,
            ];
            return view('pages/admin/kas/rekap', $data);
        } else {
            $this->session->setFlashdata('message', "Silahkan login terlebih dahulu");
            return redirect()->to(base_url('login'));
        }
    }
    public function export()
    {
        $tg_awal = $this->request->getVar('awal');
        $tg_akhir = $this->request->getVar('akhir');
        $masuk_sblm = $this->pemasukan->selectSum('jumlah')->where('tanggal < "' . $tg_awal . '"')->find()[0]->jumlah;
        $keluar_sblm = $this->pengeluaran->selectSum('jumlah')->where('tanggal < "' . $tg_awal . '"')->find()[0]->jumlah;
        $sblm = $masuk_sblm - $keluar_sblm;

        $kas_masuk = $this->pemasukan->select(['id', 'tanggal', 'ket', 'jumlah'])->where('tanggal BETWEEN "' . date('Y-m-d', strtotime($tg_awal)) . '" and "' . date('Y-m-d', strtotime($tg_akhir)) . '"')->find();
        $jum_masuk = $this->pemasukan->selectSum('jumlah')->where('tanggal BETWEEN "' . date('Y-m-d', strtotime($tg_awal)) . '" and "' . date('Y-m-d', strtotime($tg_akhir)) . '"')->find()[0]->jumlah;
        $kas_keluar = $this->pengeluaran->select(['id', 'tanggal', 'ket', 'jumlah'])->where('tanggal BETWEEN "' . date('Y-m-d', strtotime($tg_awal)) . '" and "' . date('Y-m-d', strtotime($tg_akhir)) . '"')->find();
        $jum_keluar = $this->pengeluaran->selectSum('jumlah')->where('tanggal BETWEEN "' . date('Y-m-d', strtotime($tg_awal)) . '" and "' . date('Y-m-d', strtotime($tg_akhir)) . '"')->find()[0]->jumlah;

        $akhir = ($sblm + $jum_masuk) - $jum_keluar;

        $file_name = 'rekap kas';
        $spreadsheet = new Spreadsheet();
        //mulai membuat excel
        $sheet = $spreadsheet->getActiveSheet();
        $hit = 1;
        $sheet->mergeCells('A' . $hit . ':D' . $hit);
        $sheet->setCellValue('A' . $hit, 'REKAP KAS');
        $hit++;
        $hit++;
        $sheet->mergeCells('A' . $hit . ':D' . $hit);
        $sheet->setCellValue('A' . $hit, 'Data dari tanggal ' . $tg_awal . ' sampai ' . $tg_akhir);
        $hit++;
        $sheet->mergeCells('A' . $hit . ':C' . $hit);
        $sheet->setCellValue('A' . $hit, 'Sisa Kas Sebelumnya');
        $sheet->setCellValue('D' . $hit, 'Rp ' . $sblm);
        $hit++;
        if ($sblm < 0) {
            $sheet->mergeCells('A' . $hit . ':D' . $hit);
            $sheet->setCellValue('A' . $hit, "*Kas kempunyai defisit anggaran");
            $hit++;
        }
        $sheet->mergeCells('A' . $hit . ':D' . $hit);
        $hit++;
        $sheet->mergeCells('A' . $hit . ':D' . $hit);
        $sheet->setCellValue('A' . $hit, 'Data Pemasukan');
        $hit++;
        $sheet->setCellValue('A' . $hit, 'No');
        $sheet->setCellValue('B' . $hit, 'Tanggal');
        $sheet->setCellValue('C' . $hit, 'Keterangan');
        $sheet->setCellValue('D' . $hit, 'Jumlah');
        $hit++;
        $no = 1;
        foreach ($kas_masuk as $data) {
            $sheet->setCellValue('A' . $hit, $no);
            $sheet->setCellValue('B' . $hit, $data->tanggal);
            $sheet->setCellValue('C' . $hit, $data->ket);
            $sheet->setCellValue('D' . $hit, 'Rp ' . $data->jumlah);
            $hit++;
            $no++;
        }
        $sheet->mergeCells('A' . $hit . ':C' . $hit);
        $sheet->setCellValue('A' . $hit, 'Jumlah Pemasukan');
        $sheet->setCellValue('D' . $hit, 'Rp ' . $jum_masuk);
        $hit++;
        $sheet->mergeCells('A' . $hit . ':D' . $hit);
        $hit++;
        $sheet->mergeCells('A' . $hit . ':D' . $hit);
        $sheet->setCellValue('A' . $hit, 'Data Pengeluaran');
        $hit++;
        $sheet->setCellValue('A' . $hit, 'No');
        $sheet->setCellValue('B' . $hit, 'Tanggal');
        $sheet->setCellValue('C' . $hit, 'Keterangan');
        $sheet->setCellValue('D' . $hit, 'Jumlah');
        $hit++;
        $no = 1;
        foreach ($kas_keluar as $data) {
            $sheet->setCellValue('A' . $hit, $no);
            $sheet->setCellValue('B' . $hit, $data->tanggal);
            $sheet->setCellValue('C' . $hit, $data->ket);
            $sheet->setCellValue('D' . $hit, 'Rp ' . $data->jumlah);
            $hit++;
            $no++;
        }
        $sheet->mergeCells('A' . $hit . ':C' . $hit);
        $sheet->setCellValue('A' . $hit, 'Jumlah Pengeluaran');
        $sheet->setCellValue('D' . $hit, 'Rp ' . $jum_keluar);
        $hit++;
        $sheet->setCellValue('A' . $hit, 'Jumlah Akhir');
        $sheet->setCellValue('D' . $hit, 'Rp ' . $akhir);
        $no = 1;
        foreach ($kas_keluar as $data) {
            $sheet->setCellValue('A' . $hit, $no);
            $sheet->setCellValue('B' . $hit, $data->tanggal);
            $sheet->setCellValue('C' . $hit, $data->ket);
            $sheet->setCellValue('D' . $hit, 'Rp ' . $data->jumlah);
            $hit++;
            $no++;
        }
        $sheet->mergeCells('A' . $hit . ':C' . $hit);
        $sheet->setCellValue('A' . $hit, 'Jumlah Pengeluaran');
        $sheet->setCellValue('D' . $hit, 'Rp ' . $jum_keluar);
        $hit++;
        $sheet->mergeCells('A' . $hit . ':D' . $hit);
        $hit++;
        $sheet->mergeCells('A' . $hit . ':D' . $hit);
        $sheet->setCellValue('A' . $hit, 'Jumlah Akhir');
        $hit++;
        $sheet->mergeCells('A' . $hit . ':D' . $hit);
        $sheet->setCellValue('A' . $hit, 'Jumlah Akhir = ( Sisa Kas Sebelunya + Jumlah Pemasukan ) - Jumlah Pengeluaran');
        $hit++;
        $sheet->mergeCells('A' . $hit . ':C' . $hit);
        $sheet->setCellValue('A' . $hit, 'Jumlah Kas');
        $sheet->setCellValue('D' . $hit, 'Rp ' . $akhir);
        $hit++;
        if ($akhir < 0) {
            $sheet->mergeCells('A' . $hit . ':D' . $hit);
            $sheet->setCellValue('A' . $hit, "*Kas kempunyai defisit anggaran");
        }
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000000'],
                ],
            ],
        ];

        $sheet->getStyle('A4:D' . $hit)->applyFromArray($styleArray);
        $writer = new Xlsx($spreadsheet);
        $writer->save($file_name);

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $file_name . '.xlsx"');
        header('Cache-Control: max-age=0');
        flush();
        readfile($file_name);
        exit;
    }
}
