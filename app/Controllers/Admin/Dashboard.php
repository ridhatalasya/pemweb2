<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\EventModel;
use App\Models\PenggunaModel;

class Dashboard extends BaseController
{
    protected $eventModel;
    protected $penggunaModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->penggunaModel = new PenggunaModel();
    }

    public function index()
    {
        // total event
        $data = [
            'title' => 'Dashboard',
            'event' => $this->eventModel->findAll(),
            // where role is not 1
            'pengguna' => $this->penggunaModel->where('role !=', 1)->findAll()
        ];

        return view('admin/dashboard', $data);
    }
}
