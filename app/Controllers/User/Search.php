<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class Search extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        // Ambil input 'q' dari form search di header
        $keyword = $this->request->getGet('q');

        if (!$keyword) {
            // Disesuaikan dengan folder 'Search' (S Kapital)
            return view('user/Search/result', [
                'title'    => 'Hasil Pencarian',
                'keyword'  => '',
                'products' => [],
                'total'    => 0
            ]);
        }

        // Ambil data dengan Join ke kategori dan lokasi
        $builder = $this->produkModel->builder();
        $builder->select('produk.*, kategori.nama_kategori, lokasi.nama_lokasi');
        $builder->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $builder->join('lokasi', 'lokasi.id_lokasi = produk.id_lokasi', 'left');
        $builder->where('produk.status', 'aktif');

        // Cari berdasarkan Nama Produk ATAU Nama Kategori
        $builder->groupStart();
            $builder->like('produk.nama_produk', $keyword);
            $builder->orLike('kategori.nama_kategori', $keyword);
        $builder->groupEnd();

        $products = $builder->get()->getResultArray();

        $data = [
            'title'    => 'Hasil Pencarian: ' . esc($keyword),
            'keyword'  => $keyword,
            'products' => $products,
            'total'    => count($products)
        ];

        return view('user/search/result', $data);
    }
}