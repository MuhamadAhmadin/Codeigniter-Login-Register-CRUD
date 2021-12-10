<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use Exception;

class UserController extends BaseController
{
    private User $User;

    public function __construct()
    {
        $this->user = new User();
        $this->user->asObject();
    }

    public function index()
    {
        $model = $this->user;
        $data['users'] = $model->findAll();
        $data['title'] = 'List User';
		echo view('dashboard/user/index', $data);
    }
    
    public function delete($id){
        try {
            $this->user->delete($id);
        } catch (Exception $e) {
            return redirect()->to('dashboard/user')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        return redirect()->to('/dashboard/user')->with('success', 'Berhasil menghapus data');
    }
}
