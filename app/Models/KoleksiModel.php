<?php

namespace App\Models;

use CodeIgniter\Model;

class KoleksiModel extends Model
{
    protected $table      = 'koleksi';
    protected $primaryKey = 'id_koleksi';

    protected $allowedFields = [
        'id_user',
        'id_produk'
    ];

    protected $useTimestamps = false;
}
