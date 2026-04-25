<?php
namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\KoleksiModel;

class Koleksi extends BaseController
{
    // ================= TOGGLE (JANGAN DIUBAH) =================
    public function toggle()
    {
        if (!logged_in()) {
            return $this->response->setJSON([
                'status' => 'login'
            ]);
        }

        $idProduk = $this->request->getPost('id_produk');
        $idUser   = user()->id;

        if (!$idProduk || !$idUser) {
            return $this->response->setJSON([
                'status' => 'error',
                'msg' => 'Data tidak lengkap'
            ]);
        }

        $model = new KoleksiModel();

        $cek = $model
            ->where('id_user', $idUser)
            ->where('id_produk', $idProduk)
            ->first();

        if ($cek) {
            $model->delete($cek['id_koleksi']);
            return $this->response->setJSON(['status' => 'removed']);
        }

        $model->insert([
            'id_user'   => $idUser,
            'id_produk' => $idProduk
        ]);

        return $this->response->setJSON(['status' => 'saved']);
    }

    // ================= INDEX (INI YANG KAMU BUTUH) =================
    public function index()
    {
        if (!logged_in()) {
            return redirect()->to(base_url('login'));
        }

        $model = new KoleksiModel();

        // 🔥 AMBIL DATA KOLEKSI + PRODUK
        $koleksi = $model
            ->select('produk.*')
            ->join('produk', 'produk.id_produk = koleksi.id_produk')
            ->where('koleksi.id_user', user()->id)
            ->findAll();

        return view('user/koleksi/index', [
            'koleksi' => $koleksi
        ]);
    }
}
