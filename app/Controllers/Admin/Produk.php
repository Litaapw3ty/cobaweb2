<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\LokasiModel;
use App\Models\SubKategoriModel;

class Produk extends BaseController
{
    protected $produk;
    protected $kategori;
    protected $lokasi;
    protected $subKategori;

    public function __construct()
    {
        $this->produk   = new ProdukModel();
        $this->kategori = new KategoriModel();
        $this->lokasi   = new LokasiModel();
        $this->subKategori = new SubKategoriModel();
    }

    public function index()
    {
        $data['produk'] = $this->produk
            ->select('
                produk.*,
                kategori.nama_kategori,
                sub_kategori.nama_sub_kategori,
                lokasi.nama_lokasi
            ')
            ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
            ->join('sub_kategori', 'sub_kategori.id_sub_kategori = produk.id_sub_kategori', 'left')
            ->join('lokasi', 'lokasi.id_lokasi = produk.id_lokasi', 'left')
            ->orderBy('produk.id_produk', 'DESC')
            ->findAll();

        return view('admin/produk/index', $data);
    }

    public function create()
    {
        return view('admin/produk/create', [
            'kategori' => $this->kategori->findAll(),
            'lokasi'   => $this->lokasi->findAll()
        ]);
    }

    public function store()
    {
        $file = $this->request->getFile('gambar');

        $namaGambar = null;
        if ($file && $file->isValid()) {
            $namaGambar = $file->getRandomName();
            $file->move(ROOTPATH . 'public/assets/img', $namaGambar);

            $sub = $this->subKategori
            ->where('id_sub_kategori', $this->request->getPost('id_sub_kategori'))
            ->where('id_kategori', $this->request->getPost('id_kategori'))
            ->first();

        if (!$sub) {
            return redirect()->back()
                ->with('error', 'Sub kategori tidak sesuai kategori');
        }

        }

        $this->produk->insert([
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_lokasi'   => $this->request->getPost('id_lokasi'),
            'id_sub_kategori' => $this->request->getPost('id_sub_kategori'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga_sewa'  => $this->request->getPost('harga_sewa'),
            'stok'        => $this->request->getPost('stok'),
            'gambar'      => $namaGambar,
            'is_popular'  => $this->request->getPost('is_popular') ?? 0,
            'status'      => $this->request->getPost('status'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'spesifikasi' => $this->request->getPost('spesifikasi'),
            'rating'      => $this->request->getPost('rating') ?? 0,
            'ulasan'      => $this->request->getPost('ulasan') ?? 0,

        ]);

        return redirect()->to('/admin/produk')->with('success','Produk ditambahkan');
    }

    public function edit($id)
    {
        $produk = $this->produk->find($id);

        return view('admin/produk/edit', [
            'produk'      => $produk,
            'kategori'    => $this->kategori->findAll(),
            'subKategori' => $this->subKategori
                ->where('id_kategori', $produk['id_kategori'])
                ->findAll(),
            'lokasi'      => $this->lokasi->findAll()
        ]);
    }

    public function update($id)
    {
        $data = [
            'id_kategori'     => $this->request->getPost('id_kategori'),
            'id_sub_kategori' => $this->request->getPost('id_sub_kategori'),
            'id_lokasi'       => $this->request->getPost('id_lokasi'),
            'nama_produk'     => $this->request->getPost('nama_produk'),
            'harga_sewa'      => $this->request->getPost('harga_sewa'),
            'stok'            => $this->request->getPost('stok'),
            'is_popular'      => $this->request->getPost('is_popular') ?? 0,
            'status'          => $this->request->getPost('status'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'spesifikasi' => $this->request->getPost('spesifikasi'),
            'rating'      => $this->request->getPost('rating') ?? 0,
            'ulasan'      => $this->request->getPost('ulasan') ?? 0,

        ];

        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid()) {
            $namaGambar = $file->getRandomName();
        $file->move(ROOTPATH . 'public/assets/img', $namaGambar);            $data['gambar'] = $namaGambar;
        $sub = $this->subKategori
            ->where('id_sub_kategori', $this->request->getPost('id_sub_kategori'))
            ->where('id_kategori', $this->request->getPost('id_kategori'))
            ->first();

        if (!$sub) {
            return redirect()->back()
                ->with('error', 'Sub kategori tidak sesuai kategori');
        }

        }

        $this->produk->update($id, $data);
        return redirect()->to('/admin/produk')->with('success','Produk diupdate');
    }

    public function delete($id)
    {
        $this->produk->delete($id);
        return redirect()->to('/admin/produk')->with('success','Produk dihapus');
    }
}
