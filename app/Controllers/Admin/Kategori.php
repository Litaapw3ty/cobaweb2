<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategori;

    public function __construct()
    {
        $this->kategori = new KategoriModel();
    }

    public function index()
    {
        return view('admin/kategori/index', [
            'kategori' => $this->kategori->findAll()
        ]);
    }

    public function create()
    {
        return view('admin/kategori/create');
    }

    public function store()
    {
        $this->kategori->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'icon'          => $this->request->getPost('icon'),
        ]);

        return redirect()->to('/admin/kategori')->with('success', 'Kategori ditambahkan');
    }

    public function edit($id)
    {
        return view('admin/kategori/edit', [
            'kategori' => $this->kategori->find($id)
        ]);
    }

    public function update($id)
    {
        $this->kategori->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'icon'          => $this->request->getPost('icon'),
        ]);

        return redirect()->to('/admin/kategori')->with('success', 'Kategori diupdate');
    }

    public function delete($id)
    {
        $this->kategori->delete($id);
        return redirect()->to('/admin/kategori')->with('success', 'Kategori dihapus');
    }
}
