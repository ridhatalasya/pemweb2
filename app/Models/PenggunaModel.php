<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['nama', 'username', 'email', 'no_telp', 'kata_sandi', 'role'];

    public function deleteAllRelated($id)
    {
        $this->db->table('pembelian')->where('id_pengguna', $id)->delete();
        $this->db->table('event')->where('id_pengguna', $id)->delete();
        $this->db->table('pembayaran')->where('id_pengguna', $id)->delete();
        $this->db->table('pengguna')->where('id_pengguna', $id)->delete();
    }
}