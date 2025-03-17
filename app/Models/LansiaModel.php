<?php

namespace App\Models;

use CodeIgniter\Model;

class LansiaModel extends Model
{
    protected $table = 'tb_data_lansia_surobayan'; // Nama tabel
    protected $primaryKey = 'id';
    protected $allowedFields = ['nik', 'nama', 'alamat', 'usia', 'jenis_kelamin']; // Sesuaikan dengan kolom tabel

    // Ambil semua data lansia
    public function getLansia($gender = null, $search = null)
    {
        $builder = $this->db->table($this->table);
        
        if ($gender) {
            $builder->where('jenis_kelamin', $gender);
        }

        if ($search) {
            $builder->like('nama', $search)->orLike('nik', $search);
        }

        return $builder->get()->getResultArray();
    }
}
