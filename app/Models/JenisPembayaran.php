<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisPembayaran extends Model
{
    protected $table      = 'tb_jenis_pembayaran';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_jenis_pembayaran';
    protected $allowedFields = ['nama_jenis_pembayaran', 'nominal', 'tahun_ajaran'];
}
