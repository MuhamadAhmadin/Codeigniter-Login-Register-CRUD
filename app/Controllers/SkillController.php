<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Skill;
use Exception;

class SkillController extends BaseController
{
    private Skill $Skill;

    public function __construct()
    {
        $this->skill = new Skill();
        $this->skill->asObject();
    }

    public function index()
    {
        $model = $this->skill;
        $data['skills'] = $model->findAll();
        $data['title'] = 'List Skill';
		echo view('dashboard/skill/index', $data);
    }

    public function new()
    {
        $data['title'] = 'Tambah Skill';
		echo view('dashboard/skill/create', $data);
    }

    public function store()
    {
        $data = [
            'kode' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
            'bidang' => $this->request->getPost('bidang'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        if (!$this->skill->validate($data)) {
            return redirect()->to('/dashboard/skill/new')->withInput()->with('errors', $this->skill->errors());
        }

        try {
            $this->skill->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('/dashboard/skill/new')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/dashboard/skill/new')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        $model = $this->skill;
        $data['data'] = $model->where('id', $id)->first();
        $data['title'] = 'Update Data';
        
        echo view('dashboard/skill/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'kode' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
            'bidang' => $this->request->getPost('bidang'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        if (!$this->skill->validate($data)) {
            return redirect()->to('/dashboard/skill/'. $id .'/edit')->withInput()->with('errors', $this->skill->errors());
        }

        try {
            $this->skill->protect(false)->update($id, $data);
        } catch (Exception $e) {
            return redirect()->to('/dashboard/skill/'. $id .'/edit')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/dashboard/skill/'. $id .'/edit')->with('success', 'Berhasil mengupdate data');
    }
    
    public function delete($id){
        try {
            $this->skill->delete($id);
        } catch (Exception $e) {
            return redirect()->to('dashboard/skill')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        return redirect()->to('/dashboard/skill')->with('success', 'Berhasil menghapus data');
    }
}
