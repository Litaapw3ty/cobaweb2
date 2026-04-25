<?php

namespace App\Controllers;
use App\Models\ProdukModel;
use App\Models\LokasiModel;


class Lokasi extends BaseController
{
public function detail($slug)
{
$lokasi = new LokasiModel();
$produk = new ProdukModel();


$lok = $lokasi->where('slug',$slug)->first();


return view('lokasi', [
'lokasi' => $lok,
'produk' => $produk->where('lokasi_id',$lok['id'])->findAll()
]);
}
}