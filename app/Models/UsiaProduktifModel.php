<?php

namespace App\Models;

use CodeIgniter\Model;

class UsiaProduktifModel extends Model
{
    protected $table = 'tb_data_usia_produktif_surobayan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nik', 'nama', 'alamat', 'usia', 'jenis_kelamin'];

    public function getFilteredData($search = null, $alamat = null, $jenisKelamin = null)
    {
        $builder = $this->table($this->table);

        if ($search) {
            $builder->like('nama', $search)->orLike('nik', $search);
        }
        if ($alamat) {
            $builder->where('alamat', $alamat);
        }
        if ($jenisKelamin) {
            $builder->where('jenis_kelamin', $jenisKelamin);
        }

        return $builder->findAll();
    }
}
