<?php

namespace App\Controllers;

use App\Models\RemajaPutriModel;
use CodeIgniter\Controller;

class RemajaPutriController extends Controller
{
    protected $remajaputriModel;

    public function __construct()
    {
        $this->remajaputriModel = new RemajaPutriModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('search');
        $data['remajaputri'] = $keyword 
            ? $this->remajaputriModel->search($keyword) 
            : $this->remajaputriModel->findAll();

        return view('admin/data_remaja_putri', $data);
    }
}
