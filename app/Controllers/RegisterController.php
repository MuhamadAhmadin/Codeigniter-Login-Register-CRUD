<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\User;
 
class RegisterController extends Controller
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }
 
    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];
        // dd($this->request->post);
        $data = [
            'user_name'     => $this->request->getPost('name'),
            'user_email'    => $this->request->getPost('email'),
            'user_password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];
        if($this->validate($rules)){
            $model = new User();
            $model->save($data);
            return redirect()->to(base_url('/login'))->with('success', 'Berhasil registrasi, silahkan login');
        }else{
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
         
    }
 
}