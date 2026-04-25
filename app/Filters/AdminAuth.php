<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // ✅ CEK LOGIN DAN ROLE ADMIN menggunakan Myth:Auth helper
        if (!logged_in() || !in_groups('admin')) {
            return redirect()->to('/login')
                ->with('error', 'Anda harus login sebagai admin');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}