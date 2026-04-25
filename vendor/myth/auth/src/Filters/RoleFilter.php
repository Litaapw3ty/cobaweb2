<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel; // 🔥 INI YANG PENTING
use Myth\Auth\Password;

class RoleFilter extends BaseController
{
    public function registerProcess()
    {
        $userModel = new UserModel();

        $userId = $userModel->insert([
            'email'    => $this->request->getPost('email_phone'),
            'username' => $this->request->getPost('fullname'),
            'password' => Password::hash(
                $this->request->getPost('password')
            ),
        ]);

        // ✅ GROUP AKAN KELOAD DENGAN BENAR
        $userModel->withGroup('user')->update($userId, []);

        return redirect()->to('/login');
    }

    public function loginProcess()
    {
        $auth = service('authentication');

        $credentials = [
            'email'    => $this->request->getPost('identity'),
            'password' => $this->request->getPost('password'),
        ];

        if (! $auth->attempt($credentials)) {
            return redirect()->back()->with('error', 'Login gagal');
        }

        // 🔥 SEKARANG INI AKAN TRUE
        if (in_groups('admin')) {
            return redirect()->to('/admin/dashboard');
        }

        return redirect()->to('/');
    }
}
