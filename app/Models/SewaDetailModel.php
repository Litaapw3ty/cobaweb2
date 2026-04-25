<?php

namespace App\Models;

use CodeIgniter\Model;

class SewaDetailModel extends Model
{
    protected $table = 'sewa_detail';
    protected $primaryKey = 'id_detail';

    protected $allowedFields = [
        'id_sewa',
        'id_produk',
        'qty',
        'harga'
    ];
}