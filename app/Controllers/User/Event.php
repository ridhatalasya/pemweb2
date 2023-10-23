<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\EventModel;

class Event extends BaseController
{
    private $eventModel;
    private $session_id;

    function __construct()
    {
        $this->eventModel = new EventModel();
        $this->session_id = session()->get('id_pengguna');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Event',
            'event' => $this->eventModel->where('id_pengguna', $this->session_id)->paginate(10, 'event'),
            'pager' => $this->eventModel->pager
        ];
        return view('User/event/list', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'nama_acara' => 'required',
                'deskripsi_acara' => 'required',
                'tempat_acara' => 'required',
                'tanggal_acara' => 'required',
                'waktu_acara' => 'required',
                'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            if (!$isDataValid) {
                session()->setFlashdata('error', 'Data Event tidak valid');
                return redirect()->to(base_url('user/event/create'))->withInput()->with('validation', $validation->getErrors());
            } else {

                session()->setFlashdata('success', 'Pengguna berhasil ditambahkan');
                return redirect()->to(base_url('admin/pengguna'));
            }
        } else {
            $data = [
                'title' => 'Tambah Event',
                // 'validation' => \Config\Services::validation()
            ];
            return view('User/event/create', $data);
        }
    }
}