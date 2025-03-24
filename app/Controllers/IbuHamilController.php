<?php

namespace App\Controllers;

use App\Models\IbuHamilModel;
use CodeIgniter\Controller;

class IbuHamilController extends Controller
{
    protected $ibuHamilModel;

    public function __construct()
    {
        $this->ibuHamilModel = new IbuHamilModel();
    }

    public function index()
    {
        $searchQuery = $this->request->getGet('search');

        $query = $this->ibuHamilModel;

        if (!empty($searchQuery)) {
            $query = $query->like('nik', $searchQuery)->orLike('nama_ibu_hamil', $searchQuery);
        }

        $data['ibuHamil'] = $query->findAll();
        $data['searchQuery'] = $searchQuery;

        return view('admin/data_ibu_hamil', $data);
    }
}
