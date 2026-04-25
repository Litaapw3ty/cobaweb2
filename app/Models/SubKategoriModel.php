<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKategoriModel extends Model
{
    protected $table      = 'sub_kategori';
    protected $primaryKey = 'id_sub_kategori';
    protected $allowedFields = [
        'id_kategori',
        'nama_sub_kategori'
    ];
}