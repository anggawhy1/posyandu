<?php

namespace App\Models;

use CodeIgniter\Model;

class DataRemajaModel extends Model
{
    protected $table = 'tb_data_remajaputri2025_surobayan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_lengkap',
        'nik',
        'tanggal_lahir',
        'golongan_darah',
        'kadar_hb',
        'alamat',
        'nomor_telepon'
    ];
}
