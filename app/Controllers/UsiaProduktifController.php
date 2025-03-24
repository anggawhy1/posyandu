<?php

namespace App\Controllers;

use App\Models\UsiaProduktifModel;
use CodeIgniter\Controller;

class UsiaProduktifController extends Controller
{
    protected $usiaProduktifModel;

    public function __construct()
    {
        $this->usiaProduktifModel = new UsiaProduktifModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        $alamat = $this->request->getGet('alamat');
        $jenisKelamin = $this->request->getGet('jenis_kelamin');

        $data['usiaProduktif'] = $this->usiaProduktifModel->getFilteredData($search, $alamat, $jenisKelamin);

        return view('admin/data_usia_produktif', $data);
    }
}
