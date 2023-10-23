<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

use App\Models\EventModel;
use App\Models\TiketModel;
use App\Models\PembelianModel;

class Pembelian extends BaseController
{
    private $eventModel;
    private $tiketModel;
    private $pembelianModel;
    private $session_id;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->tiketModel = new TiketModel();
        $this->pembelianModel = new PembelianModel();
        $this->session_id = session()->get('id_pengguna');
    }

    public function index()
    {
        $pembelian = $this->pembelianModel->where('id_pengguna', $this->session_id)->paginate(10, 'pembelian');
        return view('user/pembelian/list', [
            'pembelian' => $pembelian,
            'pager' => $this->pembelianModel->pager,
        ]);
    }
}
