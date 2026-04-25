<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LokasiModel;

class Lokasi extends BaseController
{
    protected $lokasi;

    public function __construct()
    {
        $this->lokasi = new LokasiModel();
    }

    public function index()
    {
        return view('admin/lokasi/index', [
            'lokasi' => $this->lokasi->findAll()
        ]);
    }

    public function create()
    {
        return view('admin/lokasi/create');
    }

    public function store()
    {
        $nama = $this->request->getPost('nama_lokasi');

        $this->lokasi->insert([
            'nama_lokasi' => $nama,
            'slug'        => url_title($nama, '-', true),
        ]);

        return redirect()->to('/admin/lokasi')->with('success', 'Lokasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('admin/lokasi/edit', [
            'lokasi' => $this->lokasi->find($id)
        ]);
    }

    public function update($id)
    {
        $nama = $this->request->getPost('nama_lokasi');

        $this->lokasi->update($id, [
            'nama_lokasi' => $nama,
            'slug'        => url_title($nama, '-', true),
        ]);

        return redirect()->to('/admin/lokasi')->with('success', 'Lokasi berhasil diupdate');
    }

    public function delete($id)
    {
        $this->lokasi->delete($id);
        return redirect()->to('/admin/lokasi')->with('success', 'Lokasi berhasil dihapus');
    }
}
