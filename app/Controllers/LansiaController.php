<?php
namespace App\Controllers;

use App\Models\LansiaModel;
use CodeIgniter\Controller;

class LansiaController extends Controller
{
    public function index()
    {
        $model = new LansiaModel();

        // Tangkap filter dari request GET
        $gender = $this->request->getGet('gender') ?? ""; // Pastikan tidak null
        $search = $this->request->getGet('search');

        // Ambil data dari model
        $data = [
            'lansia' => $model->getLansia($gender, $search),
            'selectedGender' => $gender // Kirim variabel ke View
        ];

        return view('admin/data-lansia', $data);
    }
}
