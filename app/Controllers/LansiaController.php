<?php

namespace App\Controllers;

use App\Models\LansiaModel;
use CodeIgniter\Controller;

class LansiaController extends Controller
{
    public function index()
    {
        $model = new LansiaModel();
        $gender = $this->request->getGet('gender'); // Ambil filter jenis kelamin dari GET
        $search = $this->request->getGet('search'); // Ambil kata kunci pencarian

        $data['lansia'] = $model->getLansia($gender, $search);
        
        return view('admin/data_lansia', $data);
    }
}
