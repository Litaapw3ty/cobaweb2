<?php 

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SewaModel;
use App\Models\ProdukModel;
use App\Models\SewaDetailModel;

class Sewa extends BaseController
{
    protected $sewaModel;
    protected $produkModel;
    protected $detailModel;

    public function test()
    {
        echo "SEWA CONTROLLER MASUK";
    }

    public function __construct()
    {
        $this->sewaModel   = new SewaModel();
        $this->produkModel = new ProdukModel();
        $this->detailModel = new SewaDetailModel();
    }

    // ================= LIST PESANAN =================
    public function index()
    {
        $data['sewa'] = $this->sewaModel
            ->select('
                sewa.id_sewa,
                sewa.id_user,
                sewa.tanggal_sewa,
                sewa.tanggal_kembali,
                sewa.total_harga,
                sewa.status,
                GROUP_CONCAT(produk.nama_produk SEPARATOR ", ") AS produk
            ')
            ->join('sewa_detail', 'sewa_detail.id_sewa = sewa.id_sewa')
            ->join('produk', 'produk.id_produk = sewa_detail.id_produk')
            ->groupBy('sewa.id_sewa')
            ->orderBy('sewa.id_sewa', 'DESC')
            ->findAll();

        return view('admin/sewa/index', $data);
    }

    // ================= KONFIRMASI (PENDING → AKTIF) =================
    public function konfirmasi($id)
    {
        $sewa = $this->sewaModel->find($id);

        // VALIDASI STATUS
        if (!$sewa || $sewa['status'] !== 'pending') {
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        // UPDATE STATUS
        $this->sewaModel->update($id, [
            'status' => 'aktif'
        ]);

        // AMBIL DETAIL SEWA
        $details = $this->detailModel
            ->where('id_sewa', $id)
            ->findAll();

        return redirect()->to('/admin/sewa')
            ->with('success', 'Pesanan berhasil dikonfirmasi');
    }

    // ================= SELESAIKAN SEWA (AKTIF → SELESAI) =================
    public function selesai($id)
    {
        $sewa = $this->sewaModel->find($id);

        // VALIDASI STATUS
        if (!$sewa || $sewa['status'] !== 'aktif') {
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        // UPDATE STATUS
        $this->sewaModel->update($id, [
            'status' => 'selesai'
        ]);

        // AMBIL DETAIL SEWA
        $details = $this->detailModel
            ->where('id_sewa', $id)
            ->findAll();

        return redirect()->to('/admin/sewa')
            ->with('success', 'Sewa selesai & stok dikembalikan');
    }

    
}
