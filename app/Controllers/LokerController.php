<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Loker;
use Exception;

class LokerController extends BaseController
{
    private Loker $Loker;

    public function __construct()
    {
        $this->loker = new Loker();
        $this->loker->asObject();
    }

    public function index()
    {
        $model = $this->loker;
        $data['lokers'] = $model->findAll();
        $data['title'] = 'List Loker';
		echo view('dashboard/loker/index', $data);
    }

    public function new()
    {
        $data['title'] = 'Tambah Loker';
		echo view('dashboard/loker/create', $data);
    }

    public function store()
    {
        $visible = ($this->request->getPost('visible')) ? 1 : 0;
        $data = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal' => $this->request->getPost('tanggal'),
            'visible' => $visible,
        ];

        if (!$this->loker->validate($data)) {
            return redirect()->to('/dashboard/loker/new')->withInput()->with('errors', $this->loker->errors());
        }

        try {
            $this->loker->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('/dashboard/loker/new')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/dashboard/loker/new')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        $model = $this->loker;
        $data['data'] = $model->where('id', $id)->first();
        $data['title'] = 'Update Data';
        
        echo view('dashboard/loker/edit', $data);
    }

    public function update($id)
    {
        $visible = ($this->request->getPost('visible')) ? 1 : 0;
        $data = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal' => $this->request->getPost('tanggal'),
            'visible' => $visible,
        ];

        if (!$this->loker->validate($data)) {
            return redirect()->to('/dashboard/loker/'. $id .'/edit')->withInput()->with('errors', $this->loker->errors());
        }

        try {
            $this->loker->protect(false)->update($id, $data);
        } catch (Exception $e) {
            return redirect()->to('/dashboard/loker/'. $id .'/edit')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/dashboard/loker/'. $id .'/edit')->with('success', 'Berhasil mengupdate data');
    }
    
    public function delete($id){
        try {
            $this->loker->delete($id);
        } catch (Exception $e) {
            return redirect()->to('dashboard/loker')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        return redirect()->to('/dashboard/loker')->with('success', 'Berhasil menghapus data');
    }
}
