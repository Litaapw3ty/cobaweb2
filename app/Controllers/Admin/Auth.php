<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login()
    {
        // ✅ REDIRECT KE LOGIN UTAMA
        // Admin dan user sekarang menggunakan halaman login yang sama
        return redirect()->to('/login');
    }

    public function loginProcess()
    {
        // ✅ REDIRECT KE LOGIN PROCESS UTAMA
        // Semua login diproses di Auth::loginProcess
        return redirect()->to('/login');
    }

    public function logout()
    {
        // ✅ LOGOUT VIA MYTH/AUTH
        service('authentication')->logout();
        
        // Hapus session tambahan
        session()->remove(['logged_in', 'admin_login']);
        
        return redirect()->to('/login')
            ->with('success', 'Anda telah logout');
    }
}
