<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Event;
use Exception;

class EventController extends BaseController
{
    private Event $Event;

    public function __construct()
    {
        $this->event = new Event();
        $this->event->asObject();
    }

    public function index()
    {
        $model = $this->event;
        $data['events'] = $model->findAll();
        $data['title'] = 'List Event';
		echo view('dashboard/event/index', $data);
    }

    public function new()
    {
        $data['title'] = 'Tambah Event';
		echo view('dashboard/event/create', $data);
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

        if (!$this->event->validate($data)) {
            return redirect()->to('/dashboard/event/new')->withInput()->with('errors', $this->event->errors());
        }

        try {
            $this->event->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('/dashboard/event/new')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/dashboard/event/new')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        $model = $this->event;
        $data['data'] = $model->where('id', $id)->first();
        $data['title'] = 'Update Data';
        
        echo view('dashboard/event/edit', $data);
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

        if (!$this->event->validate($data)) {
            return redirect()->to('/dashboard/event/'. $id .'/edit')->withInput()->with('errors', $this->event->errors());
        }

        try {
            $this->event->protect(false)->update($id, $data);
        } catch (Exception $e) {
            return redirect()->to('/dashboard/event/'. $id .'/edit')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/dashboard/event/'. $id .'/edit')->with('success', 'Berhasil mengupdate data');
    }
    
    public function delete($id){
        try {
            $this->event->delete($id);
        } catch (Exception $e) {
            return redirect()->to('dashboard/event')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        return redirect()->to('/dashboard/event')->with('success', 'Berhasil menghapus data');
    }

}