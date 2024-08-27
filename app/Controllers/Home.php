<?php

namespace App\Controllers;

use App\Models\Usuarios;


class Home extends BaseController
{
    public function index(): string
    {
        $session = session();

        if($session->get("logged_in")){
            return view("inicio");
        }else{
            return view('login');
        }

        
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
            
            $data=[
                "username" => $datos[0]["nombre_usuario"],
                "user_id" => $datos[0]["ID_usuario"],
                "tipo" => $datos[0]["ID_permiso"],
                "logged_in" => true
            ];

            $session->set($data);
            
            return redirect()->to(base_url("/inicio"));
        }else{
            $error=["value"=>"Usuario o contraseña incorrecta"];
            return view("login");
        }
    }

    public function logout(){
        $session = session();

        $session->destroy();

        return view("logout");
    }

    
}
