<?php

namespace App\Controllers;

use Myth\Auth\Controllers\AuthController as MythAuthController;

class AuthController extends MythAuthController
{
    /**
     * Attempts to verify the user's credentials through a POST request.
     * Override untuk redirect berdasarkan role
     */
    public function attemptLogin()
    {
        $rules = [
            'login'    => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $login    = $this->request->getPost('login');
        $password = $this->request->getPost('password');
        $remember = (bool) $this->request->getPost('remember');

        // ✅ Attempt to login dengan email atau username
        $auth = service('authentication');
        
        // Coba dengan email dulu
        $credentials = [
            'email'    => $login,
            'password' => $password,
        ];
        
        if (!$auth->attempt($credentials, $remember)) {
            // Jika gagal, coba dengan username
            $credentials = [
                'username' => $login,
                'password' => $password,
            ];
            
            if (!$auth->attempt($credentials, $remember)) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', $auth->error() ?? 'Email/Username atau password salah');
            }
        }

        // ✅ CEK ROLE DAN REDIRECT
        $userId = user_id();
        $db = \Config\Database::connect();
        
        $adminGroup = $db->table('auth_groups_users gu')
            ->select('g.name')
            ->join('auth_groups g', 'g.id = gu.group_id')
            ->where('gu.user_id', $userId)
            ->where('g.name', 'admin')
            ->get()
            ->getRowArray();
        
        // Jika user ada di group admin
        if ($adminGroup) {
            session()->set('admin_login', true);
            return redirect()->to('/admin/dashboard')->withCookies();
        }

        // User biasa redirect ke homepage
        $redirectURL = session('redirect_url') ?? '/';
        unset($_SESSION['redirect_url']);

        return redirect()->to($redirectURL)->withCookies()->with('message', 'Login berhasil');
    }
}
