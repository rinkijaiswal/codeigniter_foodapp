<?php
namespace App\Models;


class UserModel extends \CodeIgniter\Model {
    protected $table ="user";
    protected $allowedFields=['name','email','password','profile'];
     
    public function signup($data){
        return $this->save($data);
    }
    
    public function login($email,$password){
        $array = array('email'=>$email,'password'=>$password);
        return $this->where($array)->first();
    }
}
