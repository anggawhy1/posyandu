<?php

namespace App\Models;

use CodeIgniter\Model;

class RemajaPutriModel extends Model
{
    protected $table = 'tb_data_remajaputri2025_surobayan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_lengkap', 'nik', 'tanggal_lahir', 'golongan_darah', 
        'kadar_hb', 'alamat', 'nomor_telepon', 'created_at'
    ];

    public function search($keyword)
    {
        return $this->like('nama_lengkap', $keyword)
                    ->orLike('nik', $keyword)
                    ->findAll();
    }
}
