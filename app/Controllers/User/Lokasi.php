<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\LokasiModel;

class Lokasi extends BaseController
{
    protected $produkModel;
    protected $lokasiModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->lokasiModel = new LokasiModel();
    }

    public function index($slug)
    {
        $lokasi = $this->lokasiModel
            ->where('slug', $slug)
            ->first();

        if (!$lokasi) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $produk = $this->produkModel
            ->where('id_lokasi', $lokasi['id_lokasi'])
            ->where('status', 'aktif')
            ->findAll();

        return view('user/lokasi/index', $this->data + [
            'lokasi' => $lokasi,
            'produk' => $produk
        ]);
    }
}
