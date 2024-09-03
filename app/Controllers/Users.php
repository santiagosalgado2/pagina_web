<?php

namespace App\Controllers;

use App\Models\Usuarios;

class Users extends BaseController{

    private $usersmodel;

    public function __construct(){

        $this->usersmodel=new Usuarios();

    }

    public function changePw(){

        $pw1=$this->request->getPost("password");

        $pw2=$this->request->getPost("pw-confirm");

        if($pw1!=$pw2){

            echo "Contraseñas no coinciden";

        }else{

            $session = session();

            $hash=password_hash($pw1,PASSWORD_DEFAULT);

            $n=$this->usersmodel->updatePw($hash,$session->get("user_id"));

            if($n==true){
                echo "Contraseña cambiada";
                echo '<br><a href="'.base_url("/").'">Volver al inicio</a>';
            }else{
                echo "Ha ocurrido un error";
            }

        }

    }

}