<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthUser implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // ✅ CEK LOGIN menggunakan Myth:Auth helper
        if (!logged_in()) {
            session()->setFlashdata('redirect_back', current_url());

            return redirect()->to('/login')
                ->with('error', 'Anda harus login terlebih dahulu.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}