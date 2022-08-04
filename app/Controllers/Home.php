<?php

namespace App\Controllers;

class Home extends BaseController
{
    public $session;
    public function __construct(){
         $this->session= \Config\Services::session();
     }
    
    public function index()
    {
        if($this->session->get('isLoggedIn') == true){
            return view('welcome_message');
        }else{
            $this->session->setTempdata('error','You are not logged in.');
            return redirect()->to('/user/login');
        }
        
    }
}
