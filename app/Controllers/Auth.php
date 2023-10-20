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

            $email = $this->request->getPost('nama_pengguna');
            $password = $this->request->getPost('kata_sandi');

            $pengguna = $this->penggunaModel->where('nama_pengguna', $email)->first();

            if ($pengguna) {
                if (password_verify($password, $pengguna['kata_sandi'])) {
                    $data = [
                        'id_pengguna' => $pengguna['id_pengguna'],
                        'nama_pengguna' => $pengguna['nama_pengguna'],
                        'email_pengguna' => $pengguna['email_pengguna'],
                        'role' => $pengguna['role'],
                        'logged_in' => TRUE
                    ];
                    session()->set($data);
                    if ($pengguna['role'] == '1') {
                        return redirect()->to(base_url('admin/tiket'));
                    } else {
                        return redirect()->to(base_url('user/tiket'));
                    }
                } else {
                    session()->setFlashdata('error', 'Password salah');
                    return redirect()->to(base_url('auth/login'));
                }
            } else {
                session()->setFlashdata('error', 'Email tidak ditemukan');
                return redirect()->to(base_url('auth/login'));
            }
        } else {
            return view('auth/login');
        }
    }
}
