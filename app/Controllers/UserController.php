<?php

namespace App\Controllers;
use App\Models\UserModel;

class UserController extends \CodeIgniter\Controller {
    public $model;
    public $session;
   public function __construct(){
        helper('form') ;
        $this->model=new UserModel();
        $this->session= \Config\Services::session();
        
    }
    public function login(){
        $data=[];
        if ($this->request->getMethod()=='post'){
            $rules =[
                'email'=>'required|valid_email',
                'password'=>'required|min_length[3]'
            ];
            if($this->validate($rules)){
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $result = $this->model->login($email, $password);
                if($result){
                    $this->session->set('isLoggedIn',true);
                    $this->session->set('email',$email);
                    $this->session->set('user_id',$result['id']);
                    $this->session->setTempdata('success','You are successfully logged in',2);
                    return redirect()->to(base_url('/'));
                }else{
                    $this->session->setTempdata('error','Error occurred',2);
                }
            }else{
                $data['validation']=$this->validator;
            }
        }
        return view ('users/login',$data);
    }
    
    public function signup(){
        $data = [];
        
        if($this->request->getMethod() == 'post'){
             $rules =[
                'name'=> 'required',
                'email'=>'required|valid_email|is_unique[user.email]',
                'password'=>'required|min_length[3]',
                'profile' => 'uploaded[profile]|max_size[profile,2048]|ext_in[profile,jpg,png,gif]'
            ];
             if($this->validate($rules)){
                $file = $this->request->getFile('profile');
                if($file->isValid() && !$file->hasMoved()){
                    $newName = $file->getRandomName();
                    if($file->move(FCPATH.'/uploads',$newName)){
                        $data =([
                            'name'=>$this->request->getPost('name'),
                            'email'=>$this->request->getPost('email'),
                            'password'=>$this->request->getPost('password'),
                             'profile'=>$newName
                        ]);

                        $result = $this->model->signup($data);
                        if($result){
                            $this->session->setTempdata('success','You are successfully signed up',2);
                        }else{
                            $this->session->setTempdata('success','Error occurred',2);
                        }
                    }
                }
           }else{
               $data['validation'] = $this->validator;
           }
        }
        return view('users/signup',$data);
    }
    
    public function logout(){
        $this->session->remove('isLoggedIn');
        $this->session->remove('email');
        $this->session->remove('user_id');
        return redirect()->to('/user/login');
    }
}
