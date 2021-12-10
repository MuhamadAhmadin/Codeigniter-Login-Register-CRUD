<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Freelancer;
use App\Models\Skill;
use App\Models\Company;
use Exception;

class FreelancerController extends BaseController
{
    private Freelancer $freelancer;

    public function __construct()
    {
        $this->freelancer = new Freelancer();
        $this->freelancer->asObject();
    }

    public function index()
    {
        $data['freelancers'] = $this->freelancer->get_data();
        $data['title'] = 'List Freelancer';
		echo view('dashboard/freelancer/index', $data);
    }

    public function new()
    {
        $company = new Company();
        $skill = new Skill();
        $data['title'] = 'Tambah Freelancer';
        $data['companies'] = $company->findAll();
        $data['skills'] = $skill->findAll();
		echo view('dashboard/freelancer/create', $data);
    }

    public function store()
    {
        $data = [
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'gender' => $this->request->getPost('gender'),
            'company_id' => $this->request->getPost('company_id'),
            'skill_id' => $this->request->getPost('skill_id'),
        ];

        if (!$this->freelancer->validate($data)) {
            return redirect()->to('/dashboard/freelancer/new')->withInput()->with('errors', $this->freelancer->errors());
        }

        try {
            $this->freelancer->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('/dashboard/freelancer/new')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/dashboard/freelancer/new')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        $model = $this->freelancer;
        $data['data'] = $model->where('id', $id)->first();
        $company = new Company();
        $skill = new Skill();
        $data['title'] = 'Edit Freelancer';
        $data['companies'] = $company->findAll();
        $data['skills'] = $skill->findAll();
        
        echo view('dashboard/freelancer/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'gender' => $this->request->getPost('gender'),
            'company_id' => $this->request->getPost('company_id'),
            'skill_id' => $this->request->getPost('skill_id'),
        ];

        if (!$this->freelancer->validate($data)) {
            return redirect()->to('/dashboard/freelancer/'. $id .'/edit')->withInput()->with('errors', $this->freelancer->errors());
        }

        try {
            $this->freelancer->protect(false)->update($id, $data);
        } catch (Exception $e) {
            return redirect()->to('/dashboard/freelancer/'. $id .'/edit')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/dashboard/freelancer/'. $id .'/edit')->with('success', 'Berhasil mengupdate data');
    }
    
    public function delete($id){
        try {
            $this->freelancer->delete($id);
        } catch (Exception $e) {
            return redirect()->to('dashboard/freelancer')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        return redirect()->to('/dashboard/freelancer')->with('success', 'Berhasil menghapus data');
    }
}
