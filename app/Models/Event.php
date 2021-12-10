<?php

namespace App\Models;

use CodeIgniter\Model;

class Event extends Model
{
    protected $table      = 'events';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['judul', 'deskripsi', 'tanggal', 'visible'];

    protected $validationRules = [
        'judul' => 'required',
        'deskripsi' => 'required',
        'tanggal' => 'date',
        'visible' => 'permit_empty',
    ];

    protected $validationMessages = [
        'judul' => [
            'required' => 'Judul Event harus diisi'
        ],
        'deskripsi' => [
            'required' => 'Deskripsi Event harus diisi'
        ],
    ];
}
