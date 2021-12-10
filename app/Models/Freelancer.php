<?php

namespace App\Models;

use CodeIgniter\Model;

class Freelancer extends Model
{
    protected $table      = 'freelancers';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nik', 'nama', 'alamat', 'gender', 'company_id', 'skill_id'];

    protected $validationRules = [
        'nik' => 'required',
        'nama' => 'required',
        'alamat' => 'permit_empty',
        'gender' => 'permit_empty',
        'company_id' => 'required',
        'skill_id' => 'required',
    ];

    protected $validationMessages = [
        'nik' => [
            'required' => 'nik Berita harus diisi'
        ],
        'nama' => [
            'required' => 'nama Berita harus diisi'
        ],
        'company_id' => [
            'required' => 'Organisasi harus dipilih, jika kosong, silahkan isi dari data master'
        ],
        'skill_id' => [
            'required' => 'Jabatan harus dipilih, jika kosong, silahkan isi dari data master'
        ],
    ];

    public function get_data()
    {
    	return $this->db->table($this->table)
	    	->join('companies', 'companies.id = '.$this->table.'.company_id', 'left')
	    	->join('skills', 'skills.id = '.$this->table.'.skill_id', 'left')
            ->select('freelancers.*, skills.nama AS nama_skill, companies.nama AS nama_company')
	    	->orderBy($this->table.'.id', 'desc')->get()->getResultObject();
    }
}
