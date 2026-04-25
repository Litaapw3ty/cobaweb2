<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UlasanModel;
use App\Models\SewaModel;

class Ulasan extends BaseController
{
    protected $ulasanModel;
    protected $sewaModel;

    public function __construct()
    {
        $this->ulasanModel = new UlasanModel();
        $this->sewaModel   = new SewaModel();
    }

    public function store()
    {
        // 1️⃣ pastikan login
        if (!session()->get('logged_in')) {
            return $this->response->setJSON([
                'status' => 'login'
            ]);
        }

        $idUser   = session()->get('user_id');
        $idProduk = $this->request->getPost('id_produk');

        // 2️⃣ pastikan user PERNAH SEWA produk ini
        if (!$this->sewaModel->pernahSewa($idUser, $idProduk)) {
            return $this->response->setJSON([
                'status'  => 'forbidden',
                'message' => 'Belum pernah menyewa produk ini'
            ]);
        }

        // 3️⃣ simpan ulasan
        $this->ulasanModel->insert([
            'id_user'   => $idUser,
            'id_produk' => $idProduk,
            'rating'    => $this->request->getPost('rating'),
            'komentar'  => $this->request->getPost('komentar')
        ]);

        return $this->response->setJSON([
            'status' => 'success'
        ]);
    }
}