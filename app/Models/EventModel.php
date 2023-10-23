<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'event';
    protected $primaryKey = 'id_event';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    // allow all field
    protected $allowedFields = ['nama_acara', 'deskripsi_acara', 'tempat_acara', 'tanggal_acara', 'waktu_acara', 'image', 'id_pengguna', 'tanggal_upload', 'is_approved'];
}
