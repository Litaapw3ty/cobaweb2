<?php


namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\SewaModel;
use App\Models\SewaDetailModel;

class Sewa extends BaseController
{
    protected $produkModel;
    protected $sewaModel;
    protected $detailModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->sewaModel   = new SewaModel();
        $this->detailModel = new SewaDetailModel();
    }

    public function sewa($id_produk)
    
    {
        $produk = $this->produkModel
        ->select('produk.*, lokasi.nama_lokasi')
        ->join('lokasi', 'lokasi.id_lokasi = produk.id_lokasi', 'left')
        ->where('produk.id_produk', $id_produk)
        ->first();


    if (!$produk) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $durasi = (int) $this->request->getGet('durasi');
    if (!in_array($durasi, [1, 3, 7])) {
        $durasi = 1;
    }

    $jumlah = 1;
    $total  = $produk['harga_sewa'] * $durasi * $jumlah;

    $rekomendasi = [];

    if (!empty($produk['id_kategori'])) {
        $rekomendasi = $this->produkModel
            ->select('produk.*, lokasi.nama_lokasi')
            ->join('lokasi', 'lokasi.id_lokasi = produk.id_lokasi', 'left')
            ->where('produk.id_kategori', $produk['id_kategori'])
            ->where('produk.id_produk !=', $id_produk)
            ->where('produk.status', 'aktif')
            ->limit(3)
            ->findAll();
    }

    return view('user/sewa/index', [
        'produk'       => $produk,
        'durasi'       => $durasi,
        'total'        => $total,
        'rekomendasi'  => $rekomendasi 
    ]);
}

public function bookingWA($id_produk)
{
    if (!session()->get('logged_in')) {
        return redirect()->to('/login');
    }

    $id_user = session()->get('id_user') ?? session()->get('id');
    if (!$id_user) {
        return redirect()->to('/login');
    }

    if (!$id_produk) {
        dd('Produk tidak ditemukan');
    }

    $durasi = (int) $this->request->getGet('durasi');
    if (!in_array($durasi, [1,3,7])) {
        $durasi = 1;
    }

    $produk = $this->produkModel->find($id_produk);
    if (!$produk) {
        return redirect()->back()->with('error', 'Produk tidak ditemukan');
    }

    $jumlah = 1;
    $total_harga = $produk['harga_sewa'] * $durasi * $jumlah;

    $tanggal_sewa = date('Y-m-d');
    $tanggal_kembali = date('Y-m-d', strtotime("+$durasi days"));

    $this->sewaModel->insert([
        'id_user'         => $id_user,
        'id_produk'       => $id_produk,   
        'tanggal_sewa'    => $tanggal_sewa,
        'durasi'          => $durasi,
        'tanggal_kembali' => $tanggal_kembali,
        'total_harga'     => $total_harga,
        'status'          => 'selesai',
        'jumlah'          => 1
    ]);

    $noWa = "6285975244284";
    $pesan = urlencode(
        "Halo Admin,\n".
        "Saya ingin menyewa:\n".
        "Produk : {$produk['nama_produk']}\n".
        "Durasi : {$durasi} hari\n".
        "Total  : Rp ".number_format($total_harga,0,',','.')."\n".
        "Tanggal mulai: {$tanggal_sewa}"
    );

    return redirect()->to("https://wa.me/$noWa?text=$pesan");
}
}