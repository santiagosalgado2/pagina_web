<?php

namespace App\Controllers;

use App\Models\Usuarios;
use Config\Session;

class Home extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    public function inicio(){
        return view("inicio");
    }

    public function login(){

        $user=$this->request->getPost("username");

        $password=$this->request->getPost("password");

        $data=[
            "nombre_usuario" => $user
        ];

        $usermodel=new Usuarios();

        $datos=$usermodel->getUser($data);

        if(count($datos) > 0 and password_verify($password,$datos[0]["hash_contrasena"])){
            
            
            $session= new Session();
            
            $session
            
        }else{
            return view("login");
        }
    }

    
}
