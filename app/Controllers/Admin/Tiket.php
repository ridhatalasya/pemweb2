<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\PenggunaModel;
use App\Models\TiketModel;

class Tiket extends BaseController
{
    private $penggunaModel;
    private $tiketModel;

    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
        $this->tiketModel = new TiketModel();
    }

    public function index()
    {
        // join tiket with pengguna
        $tiket = $this->tiketModel->select('tiket.*, pengguna.nama_pengguna')
            ->join('pengguna', 'pengguna.id_pengguna = tiket.id_pengguna')
            ->findAll();
        $data = [
            'title' => 'Daftar Tiket',
            'tiket' => $tiket
        ];
        return view('tiket/list', $data);
    }
}
