<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\UlasanModel;
use App\Models\SewaModel;


class Produk extends BaseController
    {
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function detail($id)
    {
        $produk = $this->produkModel
            ->withRating()
            ->where('produk.id_produk', $id)
            ->first();

        if (!$produk) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // rekomendasi
        $rekomendasi = $this->produkModel
            ->withRating()
            ->where('produk.id_kategori', $produk['id_kategori'])
            ->where('produk.id_produk !=', $id)
            ->limit(3)
            ->findAll();

        // ulasan
        $bolehUlasan = false;

        if (session()->get('logged_in')) {
            $sewaModel = new \App\Models\SewaModel();

            $bolehUlasan = $sewaModel->pernahSewa(
                session()->get('user_id'),
                $id
            );
        }

        return view('user/produk/detail', [
            'produk'        => $produk,
            'rating'        => number_format($produk['rating'], 1),
            'jumlahUlasan'  => $produk['jumlah_ulasan'],
            'rekomendasi'   => $rekomendasi,
            'bolehUlasan'   => $bolehUlasan
        ]);
    }

public function lokasi($id)
    {
        $lokasiModel  = new \App\Models\LokasiModel();
        $koleksiModel = new \App\Models\KoleksiModel();

        $lokasiAktif = $lokasiModel->find($id);
        if (!$lokasiAktif) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $produk = $this->produkModel
            ->where('id_lokasi', $id)
            ->where('status', 'aktif')
            ->findAll();

        $koleksiIds = [];
        if (session()->get('logged_in')) {
            $koleksiIds = $koleksiModel
                ->where('id_user', session()->get('user_id'))
                ->findColumn('id_produk');
        }

        return view('user/lokasi/index', $this->data + [
            'lokasiAktif' => $lokasiAktif,
            'produk'      => $produk,
            'koleksiIds'  => $koleksiIds
        ]);
    }
}