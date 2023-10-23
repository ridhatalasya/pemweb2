<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\PenggunaModel;

class Pengguna extends BaseController
{
    private $penggunaModel;

    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
    }

    public function index()
    {
        $pengguna = $this->penggunaModel->where('role', 2)->paginate(10, 'pengguna');
        $data = [
            'title' => 'Daftar Pengguna',
            'pengguna' => $pengguna,
            'pager' => $this->penggunaModel->pager
        ];
        return view('Admin/pengguna/list', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'nama' => 'required',
                'username' => 'required|is_unique[pengguna.username]',
                'email' => 'required|is_unique[pengguna.email]|valid_email',
                'no_telp' => 'required|numeric',
                'kata_sandi' => 'required|min_length[8]',
                'konfirmasi_kata_sandi' => 'required|matches[kata_sandi]',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            if (!$isDataValid) {
                session()->setFlashdata('error', 'Data pengguna tidak valid');
                return redirect()->to(base_url('admin/pengguna/create'))->withInput()->with('validation', $validation);
            } else {
                $data = [
                    'nama' => $this->request->getPost('nama'),
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'no_telp' => $this->request->getPost('no_telp'),
                    'kata_sandi' => password_hash($this->request->getPost('kata_sandi'), PASSWORD_DEFAULT),
                    'role' => 2,
                ];
                $this->penggunaModel->insert($data);
                session()->setFlashdata('success', 'Pengguna berhasil ditambahkan');
                return redirect()->to(base_url('admin/pengguna'));
            }
        } else {
            $data = [
                'title' => 'Tambah Pengguna',
                // 'validation' => \Config\Services::validation()
            ];
            return view('Admin/pengguna/create', $data);
        }
    }

    public function update($id)
    {
        if ($this->request->getMethod() === 'post') {
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'nama' => 'required',
                'username' => 'required',
                'email' => 'required|valid_email',
                'no_telp' => 'required|numeric',
                // kata_sandi dan konfirmasi_kata_sandi tidak wajib diisi
                'kata_sandi' => 'permit_empty|min_length[8]',
                'konfirmasi_kata_sandi' => 'permit_empty|matches[kata_sandi]',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            if (!$isDataValid) {
                session()->setFlashdata('error', 'Data pengguna tidak valid');
                return redirect()->to(base_url('admin/pengguna/update/' . $id))->withInput()->with('validation', $validation);
            } else {
                if ($this->request->getPost('kata_sandi')) {
                    $data = [
                        'nama' => $this->request->getPost('nama'),
                        'username' => $this->request->getPost('username'),
                        'email' => $this->request->getPost('email'),
                        'no_telp' => $this->request->getPost('no_telp'),
                        'kata_sandi' => password_hash($this->request->getPost('kata_sandi'), PASSWORD_DEFAULT),
                    ];
                } else {
                    $data = [
                        'nama' => $this->request->getPost('nama'),
                        'username' => $this->request->getPost('username'),
                        'email' => $this->request->getPost('email'),
                        'no_telp' => $this->request->getPost('no_telp'),
                    ];
                }
                $this->penggunaModel->update($id, $data);
                session()->setFlashdata('success', 'Pengguna berhasil diupdate');
                return redirect()->to(base_url('admin/pengguna'));
            }
        } else {
            $data = [
                'title' => 'Update Pengguna',
                'pengguna' => $this->penggunaModel->find($id),
                // 'validation' => \Config\Services::validation()
            ];
            return view('Admin/pengguna/update', $data);
        }
    }

    public function delete($id)
    {
        $this->penggunaModel->deleteAllRelated($id);
        session()->setFlashdata('success', 'Pengguna berhasil dihapus');
        return redirect()->to(base_url('admin/pengguna'));
    }
}