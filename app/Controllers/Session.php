<?php

namespace App\Controllers;

use App\Models\Usuarios;

use CodeIgniter\Controller;

class Session extends BaseController{

    private $usermodel;

    public function __construct(){

        $this->usermodel=new Usuarios();

    }

    public function login(){

        $session= session();

        $user=$this->request->getPost("username");

        $password=$this->request->getPost("password");

        $remember=$this->request->getPost("remember");

        
        $data=[
            "nombre_usuario" => $user
        ];

        $datos=$this->usermodel->getUser($data);

        if(count($datos) > 0 and password_verify($password,$datos[0]["hash_contrasena"])){

            
            
            $data=[
                "username" => $datos[0]["nombre_usuario"],
                "user_id" => $datos[0]["ID_usuario"],
                "user_email" => $datos[0]["email"],
                "tipo" => $datos[0]["ID_permiso"],
                "logged_in" => true
            ];

            $session->set($data);

            if(!$remember){

                setcookie('ci_session', session_id(), 0, '/');

            }
            
            if($datos[0]["verificado"]==0){

                return redirect()->to(base_url("/generate/verificacion"));

            }else{

                $session->set("verificado",true);
                return redirect()->to(base_url("/"));
            }

            

        }else{

           $session->setFlashdata("error","Usuario o contraseña incorrectos");

            return redirect()->to(base_url("/"));

        }
    }

    public function logout(){
        $session = session();

        if($session->get("verificado")){
            $session->destroy();
            return view("logout");
        }else{
            return redirect()->to(base_url("/"));
        }

        
    }

    public function register(){

        $session= session();

        $user=$this->request->getPost("username");

        $password=$this->request->getPost("password");
    
        $pw_confirm=$this->request->getPost("password_confirm");

        $mail=$this->request->getPost("email");

        $validationrules=[
            'password' => [
            'rules' => 'required|min_length[8]|max_length[255]|regex_match[/(?=.*[A-Z])(?=.*[0-9])/]',
            'errors' => [
                    'required' => 'La contraseña es obligatoria.',
                    'min_length' => 'La contraseña debe tener al menos 8 caracteres.',
                    'regex_match' => 'La contraseña debe contener al menos una letra mayúscula y un numero',
                ],
            ],
        ];

        if($password!=$pw_confirm){

            $session->setFlashdata("error","Las contraseñas no coinciden");

            return redirect()->to(base_url("/"));

        }
        elseif(!$this->validate($validationrules)){

            $session->setFlashdata("error",$this->validator->getErrors());

            return redirect()->to(base_url("/"));

        }
        
        else{

            $where=[
                "nombre_usuario" => $user,
                "email" => $mail
            ];

            $data=$this->usermodel->getUser($where);

            if($data){

                $session->setFlashdata("error","El nombre de usuario o el correo electrónico ya estan en uso");

                return redirect()->to(base_url("/"));

            }else{

                $hash=password_hash($password,PASSWORD_DEFAULT);

                $data=[
                    "nombre_usuario" => $user,
                    "email" => $mail,
                    "hash_contrasena" => $hash,
                    "salt" => null,
                    "ID_permiso" => 1,
                    "ID_administrador" => null
                ];

               $new_user_id = $this->usermodel->insertUser($data);

               

               $session_data=[
                "username" => $user,
                "user_id" => $new_user_id,
                "user_email" => $mail,
                "tipo" => 1,
                "logged_in" => true
                ];

                $session->set($session_data);



                return redirect()->to(base_url("/generate/verificacion"));

            }
        }
    }
}