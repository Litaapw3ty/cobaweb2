<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LokasiModel;
use App\Models\KoleksiModel;

class BaseController extends Controller
{
    protected $request;
    protected $helpers = ['url', 'form'];
    protected $data = [];

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);

        // 🔥 DATA GLOBAL HEADER (LOKASI)
        $lokasiModel = new LokasiModel();
        $this->data['lokasi'] = $lokasiModel->findAll();

        // 🔥 BADGE KOLEKSI
        if (session()->get('logged_in')) {
            $koleksiModel = new KoleksiModel();
            $this->data['jumlahKoleksi'] = $koleksiModel
                ->where('id_user', session()->get('user_id'))
                ->countAllResults();
        } else {
            $this->data['jumlahKoleksi'] = 0;
        }
        
        if (!session()->get('admin_login')) {
    return redirect()->to('/admin/login');
}

    }
    
}