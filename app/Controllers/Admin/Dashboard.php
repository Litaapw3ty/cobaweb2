<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\SewaModel;

class Dashboard extends BaseController
{
    protected $produk;
    protected $kategori;
    protected $sewa;

    public function __construct()
    {
        $this->produk   = new ProdukModel();
        $this->kategori = new KategoriModel();
        $this->sewa     = new SewaModel();
    }

    /* ================= DASHBOARD ================= */
    public function index()
    {
    if (!session()->get('admin_login')) {
        return redirect()->to('/admin/login');
    }

        // CARD STATISTIK
        $totalProduk = $this->produk->countAll();
        $totalKategori = $this->kategori->countAll();

        $sewaAktif = $this->sewa
            ->where('status', 'disewa')
            ->countAllResults();

        $pesananPending = $this->sewa
            ->where('status', 'pending')
            ->countAllResults();

        // STOK MENIPIS
        $stokMenipis = $this->produk
            ->where('stok <=', 2)
            ->findAll();

        // PESANAN TERBARU
        $pesananTerbaru = $this->sewa
            ->select('
                sewa.id_sewa,
                sewa.status,
                sewa.total_harga,
                sewa.created_at,
                users.username,
                GROUP_CONCAT(produk.nama_produk SEPARATOR ", ") as nama_produk
            ')
            ->join('users', 'users.id = sewa.id_user')
            ->join('sewa_detail', 'sewa_detail.id_sewa = sewa.id_sewa')
            ->join('produk', 'produk.id_produk = sewa_detail.id_produk')
            ->orderBy('sewa.created_at', 'DESC')
            ->groupBy('sewa.id_sewa, sewa.status, sewa.total_harga, sewa.created_at, users.username')
            ->limit(5)
            ->findAll();

        return view('admin/dashboard', [
            'totalProduk'    => $totalProduk,
            'totalKategori'  => $totalKategori,
            'sewaAktif'      => $sewaAktif,
            'pesananPending' => $pesananPending,
            'stokMenipis'    => $stokMenipis,
            'pesananTerbaru' => $pesananTerbaru,
        ]);
    }

    /* ================= PESANAN ================= */
    public function pesanan()
    {
        $data['pesanan'] = $this->sewa
            ->select('sewa.*, users.nama')
            ->join('users', 'users.id_user = sewa.id_user')
            ->orderBy('sewa.created_at', 'DESC')
            ->findAll();

        return view('admin/pesanan', $data);
    }

    /* ================= INVENTARIS ================= */
    public function inventaris()
    {
        $data['produk'] = $this->produk
            ->orderBy('nama_produk', 'ASC')
            ->findAll();

        return view('admin/inventaris', $data);
    }

    /* ================= PELANGGAN ================= */
    public function pelanggan()
    {
        return view('admin/pelanggan');
    }

    /* ================= LAPORAN ================= */
    public function laporan()
    {
        return view('admin/laporan');
    }
}