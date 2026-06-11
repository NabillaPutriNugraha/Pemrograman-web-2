<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to(base_url('buku'));
        }
        return view('login');
    }

    public function loginProcess()
    {
        $db = \Config\Database::connect();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $db->table('user')
                   ->where('username', $username)
                   ->orWhere('email', $username)
                   ->get()->getRowArray();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                session()->set([
                    'username'  => $user['username'],
                    'logged_in' => true
                ]);
                return redirect()->to(base_url('buku'));
            } else {
                session()->setFlashdata('error', 'Password salah, Kelinci Cantik! 😿');
                return redirect()->to(base_url('auth'));
            }
        } else {
            session()->setFlashdata('error', 'Username tidak terdaftar! ❌');
            return redirect()->to(base_url('auth'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth'));
    }
}