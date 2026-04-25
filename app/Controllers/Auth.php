<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Myth\Auth\Password;

class Auth extends BaseController
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerProcess()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'fullname'          => 'required',
            'email_phone'       => 'required|min_length[3]|is_unique[users.email]',
            'password'          => 'required|min_length[6]',
            'password_confirm'  => 'required|matches[password]',
            'agree'             => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()
                   ->with('errors', $validation->getErrors());
        }

        $userModel = new UserModel();

        // ✅ SIMPAN USER dengan field yang benar
        $userId = $userModel->insert([
            'nama'          => $this->request->getPost('fullname'),
            'email'         => $this->request->getPost('email_phone'),
            'username'      => $this->request->getPost('email_phone'), // Username sama dengan email
            'password_hash' => Password::hash($this->request->getPost('password')),
            'active'        => 1 // Aktifkan user langsung
        ]);

        // ✅ MASUKKAN KE GROUP 'user'
        $userModel->addToGroup($userId, 'user');

        return redirect()->to('/login')
            ->with('success', 'Akun berhasil dibuat, silakan login.');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        // ✅ LOGIN VIA MYTH/AUTH
        $auth = service('authentication');

        $credentials = [
            'email'    => $this->request->getPost('login') ?? $this->request->getPost('identity'),
            'password' => $this->request->getPost('password'),
        ];

        if (! $auth->attempt($credentials)) {
            return redirect()->back()
                ->with('error', 'Email atau password salah');
        }

        // ✅ SET SESSION untuk kompatibilitas dengan filter
        session()->set('logged_in', true);

        // ✅ CEK ADMIN LANGSUNG DARI DATABASE (lebih reliable)
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
            return redirect()->to('/admin/dashboard');
        }

        // Default redirect untuk user biasa
        return redirect()->to('/');
    }

    public function logout()
    {
        service('authentication')->logout();
        return redirect()->to('/login');
    }
}
