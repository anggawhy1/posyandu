<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $model = new DashboardModel();

        // Ambil data dari model
        $data['balita'] = $model->getBalita();
        $data['remaja_putri'] = $model->getRemajaPutri();
        $data['ibu_hamil'] = $model->getIbuHamil();
        $data['lansia'] = $model->getLansia();
        $data['usia_produktif'] = $model->getUsiaProduktif();

        // ✅ Debugging: Lihat hasil data sebelum dikirim ke View
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit;

        return view('admin/dashboard', $data);
    }
}
