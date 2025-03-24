<?php

namespace App\Controllers;

use App\Models\LansiaModel;
use CodeIgniter\Controller;

class LansiaController extends Controller
{
    public function index()
    {
        $model = new LansiaModel();

        // Ambil query string dari input filter & search
        $searchQuery = $this->request->getGet('search');
        $selectedGender = $this->request->getGet('filterJK');

        // Ambil data dari model berdasarkan filter
        $data['lansia'] = $model->getLansia($searchQuery, $selectedGender);
        $data['searchQuery'] = $searchQuery;
        $data['selectedGender'] = $selectedGender;

        return view('admin/data_lansia', $data);
    }
}
