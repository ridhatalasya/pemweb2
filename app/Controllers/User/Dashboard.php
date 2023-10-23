<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

use App\Models\EventModel;
use App\Models\TiketModel;

class Dashboard extends BaseController
{
    protected $eventModel;
    protected $tiketModel;
    protected $session_id;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->tiketModel = new TiketModel();
        $this->session_id = session()->get('id_pengguna');
    }
    public function index()
    {
        $tiket = $this->tiketModel->getTiketByIdPengguna($this->session_id);
        $total_tiket = $this->tiketModel->getTotalTiketByIdPengguna($this->session_id);
        $total_tiket_vip = $this->tiketModel->getTotalTiketByIdPengguna($this->session_id, 'vip');
        $total_tiket_regular = $this->tiketModel->getTotalTiketByIdPengguna($this->session_id, 'regular');
        $event = $this->eventModel->findAll();

        return view('user/dashboard', [
            'tiket' => $tiket,
            'total_tiket' => $total_tiket,
            'total_tiket_vip' => $total_tiket_vip,
            'total_tiket_regular' => $total_tiket_regular,
            'event' => $event
        ]);
    }
}
