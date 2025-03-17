<?php

namespace App\Controllers;

use App\Models\IbuHamilModel;

class IbuHamilController extends BaseController
{
    public function index()
    {
        $model = new IbuHamilModel();
        $data['ibuHamil'] = $model->findAll(); 

        return view('admin/data_ibu_hamil', $data);
    }
}
