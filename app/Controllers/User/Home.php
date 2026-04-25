<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\SubKategoriModel;

class Home extends BaseController
{
    protected $produk;
    protected $kategori;
    protected $subKategori;

    public function __construct()
    {
        $this->produk      = new ProdukModel();  
        $this->kategori    = new KategoriModel();
        $this->subKategori = new SubKategoriModel();
    }

    public function index()
    {
        // === KATEGORI + SUBKATEGORI ===
        $kategori = $this->kategori
            ->select('
                kategori.*,
                GROUP_CONCAT(sub_kategori.nama_sub_kategori SEPARATOR ", ") as sub_list
            ')
            ->join('sub_kategori', 'sub_kategori.id_kategori = kategori.id_kategori', 'left')
            ->groupBy('kategori.id_kategori')
            ->findAll();

        return view('user/home', $this->data + [

            // POPULAR 
            'popular' => $this->produk
                ->getWithLokasi()
                ->where('produk.status', 'aktif')
                ->where('produk.is_popular', 1)
                ->findAll(),

            // KATEGORI 
            'kategori' => $kategori,

            // CAMERA
            'kamera' => $this->produk
                ->getWithLokasi()
                ->where('produk.status', 'aktif')
                ->where('produk.id_kategori', 1)
                ->findAll(),

            // === LIGHTING 
            'lighting' => $this->produk
                ->getWithLokasi()
                ->where('produk.status', 'aktif')
                ->where('produk.id_kategori', 2)
                ->findAll(),

            // === MODIFIER ===
            'modifier' => $this->produk
                ->getWithLokasi()
                ->where('produk.status', 'aktif')
                ->where('produk.id_kategori', 3)
                ->findAll(),
        ]);
    }
}
