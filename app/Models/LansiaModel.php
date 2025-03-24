<?php

namespace App\Models;

use CodeIgniter\Model;

class LansiaModel extends Model
{
    protected $table = 'tb_data_lansia_surobayan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nik', 'nama', 'alamat', 'usia', 'jenis_kelamin'];

    public function getLansia($search = '', $gender = '')
    {
        $builder = $this->builder();

        if (!empty($search)) {
            $builder->like('nik', $search)->orLike('nama', $search);
        }

        if (!empty($gender)) {
            $builder->where('jenis_kelamin', $gender);
        }

        return $builder->get()->getResultArray();
    }
}
