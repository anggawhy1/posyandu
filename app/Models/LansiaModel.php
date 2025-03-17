<?php

namespace App\Models;

use CodeIgniter\Model;

class LansiaModel extends Model
{
    protected $table = 'tb_data_lansia_surobayan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nik', 'nama', 'alamat', 'usia', 'jenis_kelamin'];

    public function getLansia($gender = null, $search = null)
    {
        $builder = $this->db->table($this->table)->select('id, nik, nama, alamat, usia, jenis_kelamin');

        if ($gender) {
            $builder->where('jenis_kelamin', $gender);
        }

        if ($search) {
            $builder->groupStart()
                ->like('nama', $search)
                ->orLike('nik', $search)
                ->groupEnd();
        }

        return $builder->get()->getResultArray();
    }
}
