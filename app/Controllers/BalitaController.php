<?php

namespace App\Controllers;

use App\Models\BalitaModel;
use CodeIgniter\Controller;

class BalitaController extends Controller
{
    public function index()
    {
        $model = new BalitaModel();
        $data['balita'] = $model->getAllBalita();

        return view('admin/data_balita', $data);
    }
}
