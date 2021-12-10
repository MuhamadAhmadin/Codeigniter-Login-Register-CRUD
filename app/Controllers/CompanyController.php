<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Company;
use Exception;

class CompanyController extends BaseController
{
    private Company $company;

    public function __construct()
    {
        $this->company = new Company();
        $this->company->asObject();
    }

    public function index()
    {
        $model = $this->company;
        $data['companies'] = $model->findAll();
        $data['title'] = 'List Company';
		echo view('dashboard/company/index', $data);
    }

    public function new()
    {
        $data['title'] = 'Tambah Company';
		echo view('dashboard/company/create', $data);
    }

    public function store()
    {
        $data = [
            'kode' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
            'direktur' => $this->request->getPost('direktur'),
            'tahun' => $this->request->getPost('tahun'),
        ];

        if (!$this->company->validate($data)) {
            return redirect()->to('/dashboard/company/new')->withInput()->with('errors', $this->company->errors());
        }

        try {
            $this->company->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('/dashboard/company/new')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/dashboard/company/new')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        $model = $this->company;
        $data['data'] = $model->where('id', $id)->first();
        $data['title'] = 'Update Data';
        
        echo view('dashboard/company/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'kode' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
            'direktur' => $this->request->getPost('direktur'),
            'tahun' => $this->request->getPost('tahun'),
        ];

        if (!$this->company->validate($data)) {
            return redirect()->to('/dashboard/company/'. $id .'/edit')->withInput()->with('errors', $this->company->errors());
        }

        try {
            $this->company->protect(false)->update($id, $data);
        } catch (Exception $e) {
            return redirect()->to('/dashboard/company/'. $id .'/edit')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/dashboard/company/'. $id .'/edit')->with('success', 'Berhasil mengupdate data');
    }
    
    public function delete($id){
        try {
            $this->company->delete($id);
        } catch (Exception $e) {
            return redirect()->to('dashboard/company')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        return redirect()->to('/dashboard/company')->with('success', 'Berhasil menghapus data');
    }
    
}
