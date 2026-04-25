<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SubKategoriModel;
use App\Models\KategoriModel;

class SubKategori extends BaseController
{
    protected $subKategoriModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->subKategoriModel = new SubKategoriModel();
        $this->kategoriModel    = new KategoriModel();
    }
    
    public function index()
    {
        $subKategori = $this->subKategoriModel
            ->select('sub_kategori.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = sub_kategori.id_kategori')
            ->findAll();

        return view('admin/sub_kategori/index', [
            'subKategori' => $subKategori
        ]);
    }

    public function create()
    {
        return view('admin/sub_kategori/create', [
            'kategori' => $this->kategoriModel->findAll()
        ]);
    }

    public function store()
    {
        $this->subKategoriModel->insert([
            'id_kategori'      => $this->request->getPost('id_kategori'),
            'nama_sub_kategori'=> $this->request->getPost('nama_sub_kategori'),
        ]);

        return redirect()->to(base_url('admin/sub_kategori'))
            ->with('success', 'Sub kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('admin/sub_kategori/edit', [
            'subKategori' => $this->subKategoriModel->find($id),
            'kategori'    => $this->kategoriModel->findAll()
        ]);
    }

    public function update($id)
    {
        $this->subKategoriModel->update($id, [
            'id_kategori'       => $this->request->getPost('id_kategori'),
            'nama_sub_kategori' => $this->request->getPost('nama_sub_kategori'),
        ]);

        return redirect()->to(base_url('admin/sub_kategori'))
            ->with('success', 'Sub kategori berhasil diupdate');
    }

    public function delete($id)
    {
        $this->subKategoriModel->delete($id);

        return redirect()->to(base_url('admin/subkategori'))
            ->with('success', 'Sub kategori berhasil dihapus');
    }

    public function byKategori($idKategori)
    {
        return $this->response->setJSON(
            $this->subKategoriModel
                ->where('id_kategori', $idKategori)
                ->findAll()
        );
    }
}