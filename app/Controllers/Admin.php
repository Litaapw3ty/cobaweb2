<?php

namespace App\Controllers;
use App\Models\ProdukModel;

class Admin extends BaseController
{
    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function produk()
    {
        $model = new ProdukModel();
        return view('admin/produk', [
            'produk' => $model->findAll()
        ]);
    }

    public function simpan()
    {
        $model = new ProdukModel();

        $gambar = $this->request->getFile('gambar');
        $namaGambar = $gambar->getRandomName();
        $gambar->move('uploads', $namaGambar);

        $model->save([
            'nama_produk' => $this->request->getPost('nama_produk'),
            'kategori' => $this->request->getPost('kategori'),
            'klasifikasi' => $this->request->getPost('klasifikasi'),
            'harga' => $this->request->getPost('harga'),
            'gambar' => $namaGambar,
            'status' => 'pending'
        ]);

        return redirect()->to('/admin/produk');
    }

    public function validasi($id)
    {
        $model = new ProdukModel();
        $model->update($id, ['status' => 'aktif']);
        return redirect()->back();
    }
}
