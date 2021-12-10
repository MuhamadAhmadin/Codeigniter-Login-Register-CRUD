<?php

namespace App\Models;

use CodeIgniter\Model;

class Loker extends Model
{
    protected $table      = 'lokers';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['judul', 'deskripsi', 'tanggal', 'visible'];

    protected $validationRules = [
        'judul' => 'required',
        'deskripsi' => 'permit_empty',
        'tanggal' => 'date',
        'visible' => 'permit_empty',
    ];

    protected $validationMessages = [
        'judul' => [
            'required' => 'Nama Loker harus diisi'
        ]
    ];
}
