<?php

namespace App\Controllers;

use App\Models\Usuarios;

use App\Models\Verificacion;

class Users extends BaseController{

    private $usersmodel;

    private $verificationmodel;

    public function __construct(){

        $this->usersmodel=new Usuarios();

        $this->verificationmodel=new Verificacion();

    }

    public function changePw(){

        $pw1=$this->request->getPost("password");

        $pw2=$this->request->getPost("pw-confirm");

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

        if($pw1!=$pw2){

            echo "Contraseñas no coinciden";
            echo '<br><a href="'.base_url("/").'">Volver al inicio</a>';

        }
        
        elseif(!$this->validate($validationrules)){
            echo "La contraseña debe contener 8 caracteres, una mayúscula y un número";
        }

        else{

            $session = session();

            $hash=password_hash($pw1,PASSWORD_DEFAULT);

            $n=$this->usersmodel->updatePw($hash,$session->get("user_id"));

            if($n==true){
                echo "Contraseña actualizada";
                echo '<br><a href="'.base_url("/").'">Volver al inicio</a>';
            }else{
                echo "Ha ocurrido un error";
            }

        }

    }

    public function newUserView(){

        $session = session();

        if($session->get("logged_in") && $session->get("verificado") && $session->get("tipo") == 1){
            return view("new_user");
        }else{
            redirect()->to(base_url("/"));
        }
       

    }

    public function createNewUser(){

        $session = session();

        $username=$this->request->getPost("username");

        $mail=$this->request->getPost("email");

        $user= $this->usersmodel->getUser(["nombre_usuario" => $username,"email"=> $mail]);

        if($user){

            echo "El correo electrónico o el nombre de usuario ya existe";

        }else{

            $user_data=[
                "nombre_usuario" => $username,
                "email" => $mail,
                "hash_contrasena" => null,
                "salt" => null,
                "ID_permiso" => 2,
                "ID_administrador" => $session->get("user_id")

            ];

            $user_id=$this->usersmodel->insertUser($user_data);

            $code= \Config\Services::generateCode();

            $url= base_url("/create_pw/".$code);

            $this->verificationmodel->insertCode($user_id,$code,"crear_contrasena");

            \Config\Services::sendEmail($mail,"Te han creado un usuario en nuestro sitio web. Tu enlace para generar tu contraseña","<h2>El usuario ".$session->get("username")." te ha creado un usuario dentro de nuestro sitio. Utiliza este enlace para generar tu contraseña <br>".$url."<br>Para iniciar sesión, utiliza este nombre de usuario: ".$username."</h2>");

            return redirect()->to(base_url("/showUsers"));

        }



    }

    public function generatePw($code){

        $findcode=$this->verificationmodel->getCode(["codigo" => $code,"usado" => 0]);

        if($findcode){

            $user_id=$findcode[0]["ID_usuario"];

            $finduser= $this->usersmodel->getUser(["ID_usuario" => $user_id]);

            if($finduser[0]["hash_contrasena"] != null){

                echo "Tu contraseña ya fue establecida";

            }else{

                $session=session();
                
                $session->set("user_id", $user_id);

                return view("create_pw");

            }

        }

    }

    public function showUsers(){

        $session=session();

        $datos=$this->usersmodel->getUsersbyAdmin($session->get("user_id"));

        return view("show_users",["datos" => $datos]);

    }

    public function viewUserinfo(){

        $session=session();

        $data=$this->usersmodel->getUser(["ID_usuario" => $session->get("user_id")]);

        if(isset($data[0]["ID_administrador"])){
            $admin=$this->usersmodel->getUser(["ID_usuario"=> $data[0]["ID_administrador"]]);
            return view("userinfo",["data"=> $data,"admin"=> $admin]);

        }else{
            return view("userinfo",["data"=> $data]);
        }

        

    }

}