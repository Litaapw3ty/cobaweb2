<?php

namespace App\Models;

use CodeIgniter\Model;

class SewaModel extends Model
{
    protected $table      = 'sewa';
    protected $primaryKey = 'id_sewa';
    protected $allowedFields = [
        'id_user',
        'id_produk',
        'tanggal_sewa',
        'durasi',
        'tanggal_kembali',
        'jumlah',
        'total_harga',
        'status'
    ];

    protected $useTimestamps = false;

    public function pernahSewa($idUser, $idProduk)
    {
        return $this->where('id_user', $idUser)
            ->where('id_produk', $idProduk)
            ->whereIn('status', ['dipinjam', 'selesai'])
            ->countAllResults() > 0;
    }
}