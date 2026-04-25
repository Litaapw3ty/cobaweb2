<?php

namespace App\Controllers;
use App\Models\ProdukModel;

class Beranda extends BaseController
{
    public function index()
    {
        
        $produk = new ProdukModel();

        $data = [
            'popular' => $produk
                            ->where('status', 'aktif')
                            ->findAll(8),

            'kamera' => $produk
                            ->where('kategori', 'kamera')
                            ->where('status', 'aktif')
                            ->findAll(8),

            'lighting' => $produk
                            ->where('kategori', 'lighting')
                            ->where('status', 'aktif')
                            ->findAll(8),
        ];

        return view('beranda', $data);
    }
}
