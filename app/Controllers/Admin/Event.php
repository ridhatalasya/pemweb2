<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\EventModel;
use App\Models\PenggunaModel;
use App\Models\TiketModel;

class Event extends BaseController
{
    private $eventModel;
    private $penggunaModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->penggunaModel = new PenggunaModel();
    }

    public function index()
    {
        // join event with pengguna
        $event = $this->eventModel->join('pengguna', 'pengguna.id_pengguna = event.id_pengguna')->paginate(10, 'event');
        $data = [
            'title' => 'Daftar Event',
            'event' => $event,
            'pager' => $this->eventModel->pager
        ];

        return view('Admin/event/list', $data);
    }

    public function update($id)
    {
        // join event with pengguna
        $event = $this->eventModel->join('pengguna', 'pengguna.id_pengguna = event.id_pengguna')->where('id_event', $id)->first();

        // $pengguna = $this->penggunaModel->findAll();
        if (empty($event)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Event dengan id ' . $id . ' tidak ditemukan');
        }
        if ($this->request->getMethod() === 'post') {
            $data = $this->request->getPost();
            $this->eventModel->update($id, $data);
            return redirect()->to(site_url('admin/event'))->with('success', 'Event berhasil diupdate');
        } else {
            $data = [
                'title' => 'Edit Event',
                'event' => $event,
                // 'pengguna' => $pengguna,
                'validation' => \Config\Services::validation()
            ];
            return view('Admin/event/update', $data);
        }
    }

    public function delete($id)
    {
        $event = $this->eventModel->find($id);
        if (empty($event)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Event dengan id ' . $id . ' tidak ditemukan');
        }
        $this->eventModel->delete($id);
        return redirect()->to(site_url('admin/event'))->with('success', 'Event berhasil dihapus');
    }
}
