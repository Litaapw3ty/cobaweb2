<?php
namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
    {
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = [
        'id_kategori',
        'id_sub_kategori',
        'id_lokasi',
        'nama_produk',
        'slug',
        'harga_sewa',
        'stok',
        'gambar',
        'deskripsi',
        'spesifikasi',
        'is_popular',
        'status'
    ];

        public function getStokInventori()
    {
        return $this->db->table('produk p')
            ->select('
                p.nama_produk,
                p.stok AS stok_total,
                COALESCE(SUM(
                    CASE 
                        WHEN s.status = "aktif" THEN sd.qty 
                        ELSE 0 
                    END
                ),0) AS stok_dipakai,
                (p.stok - COALESCE(SUM(
                    CASE 
                        WHEN s.status = "aktif" THEN sd.qty 
                        ELSE 0 
                    END
                ),0)) AS stok_tersedia
            ')
            ->join('sewa_detail sd', 'sd.id_produk = p.id_produk', 'left')
            ->join('sewa s', 's.id_sewa = sd.id_sewa', 'left')
            ->groupBy('p.id_produk')
            ->get()
            ->getResultArray();
    }

    public function getWithLokasi()
    {
    return $this->select('produk.*, lokasi.nama_lokasi')
        ->join('lokasi', 'lokasi.id_lokasi = produk.id_lokasi', 'left');
    }

    public function withRating()
    {
        return $this->select('
            produk.*,
            lokasi.nama_lokasi,
            COALESCE(AVG(ulasan.rating),0) as rating,
            COUNT(ulasan.id_ulasan) as jumlah_ulasan
        ')
        ->join('lokasi', 'lokasi.id_lokasi = produk.id_lokasi', 'left')
        ->join('ulasan', 'ulasan.id_produk = produk.id_produk', 'left')
        ->groupBy('produk.id_produk');
    }

}

