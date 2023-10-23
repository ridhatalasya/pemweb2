<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

class Auth extends BaseController
{
    private $penggunaModel;

    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
    }

    public function login()
    {
        if ($this->request->getMethod() == 'post') {

            $email = $this->request->getPost('username');
            $password = $this->request->getPost('kata_sandi') ?? '';

            $pengguna = $this->penggunaModel->where('username', $email)->first();


            if ($pengguna) {
                if (password_verify($password, $pengguna['kata_sandi'])) {
                    $data = [
                        'id_pengguna' => $pengguna['id_pengguna'],
                        'username' => $pengguna['username'],
                        'email' => $pengguna['email'],
                        'role' => $pengguna['role'],
                        'logged_in' => TRUE
                    ];
                    session()->set($data);
                    if ($pengguna['role'] == '1') {
                        return redirect()->to(base_url('admin'));
                    } else {
                        return redirect()->to(base_url('user'));
                    }
                } else {
                    session()->setFlashdata('error', 'Password salah');
                    return redirect()->to(base_url('auth/login'));
                }
            } else {
                session()->setFlashdata('error', 'Username tidak ditemukan');
                return redirect()->to(base_url('auth/login'));
            }
        } else {
            return view('auth/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('success', 'Anda berhasil logout');
        return redirect()->to(base_url('auth/login'));
    }
}
