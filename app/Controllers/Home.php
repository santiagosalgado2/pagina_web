<?php

namespace App\Controllers;

use App\Models\Usuarios;


class Home extends BaseController
{
    public function index(): string
    {
        return view('login2');
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
            $session= session();
            
            $session->set([
                
            ])
            

        }else{
            return view("login2");
        }
    }

    
}
