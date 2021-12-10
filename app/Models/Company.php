<?php

namespace App\Models;

use CodeIgniter\Model;

class Company extends Model
{
    protected $table      = 'companies';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kode', 'nama', 'direktur', 'tahun'];

    protected $validationRules = [
        'kode' => 'required',
        'nama' => 'required',
        'direktur' => 'permit_empty',
        'tahun' => 'permit_empty'
    ];

    protected $validationMessages = [
        'kode' => [
            'required' => 'Kode company harus diisi'
        ],
        'nama' => [
            'required' => 'Nama company harus diisi'
        ]
    ];
}
