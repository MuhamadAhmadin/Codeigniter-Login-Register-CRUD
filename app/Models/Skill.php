<?php

namespace App\Models;

use CodeIgniter\Model;

class Skill extends Model
{
    protected $table      = 'skills';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kode', 'nama', 'pangkat', 'keterangan'];

    protected $validationRules = [
        'kode' => 'required',
        'nama' => 'required',
        'pangkat' => 'permit_empty',
        'keterangan' => 'permit_empty'
    ];

    protected $validationMessages = [
        'kode' => [
            'required' => 'Kode Skill harus diisi'
        ],
        'nama' => [
            'required' => 'Nama Skill harus diisi'
        ]
    ];
}
