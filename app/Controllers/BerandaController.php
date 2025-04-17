<?php

namespace App\Controllers;
use App\Models\BerandaModel;

class BerandaController extends BaseController
{
    public function index()
    {
        $model = new BerandaModel();

        $data = [
            'balita' => $model->getTotal('tb_data_balita2025_surobayan'),
            'lansia' => $model->getTotal('tb_data_lansia_surobayan'),
            'ibu_hamil' => $model->getTotal('tb_data_ibuhamil_surobayan'),
            'remaja_putri' => $model->getTotal('tb_data_remajaputri2025_surobayan'),
            'usia_produktif' => $model->getTotal('tb_data_usia_produktif_surobayan'),

        ];

        return view('welcome_message', $data);
    }
}
