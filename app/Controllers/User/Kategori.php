<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\SubKategoriModel;

class Kategori extends BaseController
{
    public function index($kategoriSlug, $subSlug = null)
    {
        $kategoriModel    = new KategoriModel();
        $subKategoriModel = new SubKategoriModel();
        $produkModel      = new ProdukModel();

        // KATEGORI
        $kategori = $kategoriModel
            ->where('slug', $kategoriSlug)
            ->first();

        if (!$kategori) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $subKategori = $subKategoriModel
            ->where('id_kategori', $kategori['id_kategori'])
            ->findAll();

        $builder = $produkModel
        ->select('produk.*, lokasi.nama_lokasi')
        ->join('lokasi', 'lokasi.id_lokasi = produk.id_lokasi')
        ->where('produk.id_kategori', $kategori['id_kategori'])
        ->where('produk.status', 'aktif');

        $subAktif = null;

        if ($subSlug) {
            $sub = $subKategoriModel
                ->where('slug', $subSlug)
                ->where('id_kategori', $kategori['id_kategori'])
                ->first();

            if ($sub) {
                $builder->where('id_sub_kategori', $sub['id_sub_kategori']);
                $subAktif = $sub['id_sub_kategori'];
            }
        }

        $produk = $builder->findAll();

        return view('user/kategori', $this->data + [
            'kategori'     => $kategori,
            'produk'       => $produk,
            'subKategori'  => $subKategori,
            'subAktif'     => $subAktif,
            'kategoriSlug' => $kategoriSlug,
            
            
        ]);
    }
}