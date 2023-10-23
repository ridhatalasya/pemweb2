<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\EventModel;
use App\Models\TiketModel;

class Tiket extends BaseController
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
        $tiket = $this->tiketModel->join('event', 'event.id_event = tiket.id_event')->where('event.id_pengguna', $this->session_id)->findAll();
        return view('user/tiket/list', [
            'tiket' => $tiket,
        ]);
    }
}
