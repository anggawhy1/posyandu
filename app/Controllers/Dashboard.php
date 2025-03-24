<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\BaseConnection;
use App\Models\DokumentasiModel;

class Dashboard extends Controller
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // Balita
        $balitaQuery = $this->db->table('tb_data_balita2025_surobayan')
            ->select('COUNT(id) as total, 
                      SUM(CASE WHEN jenis_kelamin = "L" THEN 1 ELSE 0 END) as laki,
                      SUM(CASE WHEN jenis_kelamin = "P" THEN 1 ELSE 0 END) as perempuan')
            ->get()->getRowArray();

        // Remaja Putri (hanya total perempuan)
        $remajaPutriQuery = $this->db->table('tb_data_remajaputri2025_surobayan')
            ->select('COUNT(id) as total')
            ->get()->getRowArray();
        $remajaPutriQuery['perempuan'] = $remajaPutriQuery['total'];
        $remajaPutriQuery['laki'] = 0;

        // Ibu Hamil (hanya total perempuan)
        $ibuHamilQuery = $this->db->table('tb_data_ibuhamil_surobayan')
            ->select('COUNT(id) as total')
            ->get()->getRowArray();
        $ibuHamilQuery['perempuan'] = $ibuHamilQuery['total'];
        $ibuHamilQuery['laki'] = 0;

        // Lansia
        $lansiaQuery = $this->db->table('tb_data_lansia_surobayan')
            ->select('COUNT(id) as total, 
                      SUM(CASE WHEN jenis_kelamin = "L" THEN 1 ELSE 0 END) as laki,
                      SUM(CASE WHEN jenis_kelamin = "P" THEN 1 ELSE 0 END) as perempuan')
            ->get()->getRowArray();

        // Usia Produktif
        $usiaProduktifQuery = $this->db->table('tb_data_usia_produktif_surobayan')
            ->select('COUNT(id) as total, 
                      SUM(CASE WHEN jenis_kelamin = "L" THEN 1 ELSE 0 END) as laki,
                      SUM(CASE WHEN jenis_kelamin = "P" THEN 1 ELSE 0 END) as perempuan')
            ->get()->getRowArray();

        // Data Statistik
        $dataKategori = [
            ['label' => 'Balita', 'total' => $balitaQuery['total'], 'cewek' => $balitaQuery['perempuan'], 'cowok' => $balitaQuery['laki'], 'color' => 'blue'],
            ['label' => 'Remaja Putri', 'total' => $remajaPutriQuery['total'], 'cewek' => $remajaPutriQuery['perempuan'], 'cowok' => 0, 'color' => 'purple'],
            ['label' => 'Ibu Hamil', 'total' => $ibuHamilQuery['total'], 'cewek' => $ibuHamilQuery['perempuan'], 'cowok' => 0, 'color' => 'green'],
            ['label' => 'Lansia', 'total' => $lansiaQuery['total'], 'cewek' => $lansiaQuery['perempuan'], 'cowok' => $lansiaQuery['laki'], 'color' => 'red'],
            ['label' => 'Usia Produktif', 'total' => $usiaProduktifQuery['total'], 'cewek' => $usiaProduktifQuery['perempuan'], 'cowok' => $usiaProduktifQuery['laki'], 'color' => 'yellow']
        ];

        // Dokumentasi Terbaru (3 terbaru berdasarkan created_at)
        $dokumentasiModel = new DokumentasiModel();
        $dokumentasiTerbaru = $dokumentasiModel->orderBy('created_at', 'DESC')->limit(3)->findAll();

        return view('admin/dashboard', [
            'dataKategori' => $dataKategori,
            'dokumentasiTerbaru' => $dokumentasiTerbaru
        ]);
    }
}
