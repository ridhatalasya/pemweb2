<?php

namespace App\Models;

use CodeIgniter\Model;

class TiketModel extends Model
{
    protected $table = 'tiket';
    protected $primaryKey = 'id_tiket';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    // get all tiket by id_event
    public function getTiketByIdPengguna($id_pengguna, $jenis = 'all')
    {
        $id_event = $this->db->table('event')->select('id_event')->where('id_pengguna', $id_pengguna)->get()->getResultArray();
        $id_event = array_column($id_event, 'id_event');

        $tiket =  $this->db->table('tiket')->select('tiket.*, event.nama_acara, event.tanggal_acara, event.waktu_acara, event.tempat_acara, event.image')->join('event', 'event.id_event = tiket.id_event')->whereIn('tiket.id_event', $id_event);
        if ($jenis == 'all') {
            $tiket = $tiket->get()->getResultArray();
        } else {
            $tiket = $tiket->where('tiket.jenis', $jenis)->get()->getResultArray();
        }
        return $tiket;
    }

    // sum jumlah_tiket by id_event
    public function getTotalTiketByIdPengguna($id_pengguna, $jenis = 'all')
    {
        $id_event = $this->db->table('event')->select('id_event')->where('id_pengguna', $id_pengguna)->get()->getResultArray();
        $id_event = array_column($id_event, 'id_event');

        $total_tiket =  $this->db->table('tiket')->selectSum('jumlah_tiket')->whereIn('id_event', $id_event);
        $total_tiket_dibeli = $this->db->table('tiket')->selectSum('tiket_dibeli')->whereIn('id_event', $id_event);
        if ($jenis == 'all') {
            $total_tiket = $total_tiket->get()->getResultArray();
            $total_tiket_dibeli = $total_tiket_dibeli->get()->getResultArray();
        } else {
            $total_tiket = $total_tiket->where('jenis', $jenis)->get()->getResultArray();
            $total_tiket_dibeli = $total_tiket_dibeli->where('jenis', $jenis)->get()->getResultArray();
        }
        // total_tiket - total_tiket_dibeli
        $sisa_tiket = $total_tiket[0]['jumlah_tiket'] - $total_tiket_dibeli[0]['tiket_dibeli'];

        return [
            'total' => $total_tiket[0]['jumlah_tiket'],
            'sisa_tiket' => $sisa_tiket,
            'total_tiket_dibeli' => $total_tiket_dibeli[0]['tiket_dibeli']
        ];
    }
}
