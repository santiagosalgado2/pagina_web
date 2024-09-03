<?php

namespace App\Controllers;

use App\Models\Usuarios;

use App\Models\Verificacion;

class Verification extends BaseController{

    private $objusers;

    private $objverification;

    public function __construct(){

        $this->objusers=new Usuarios();

        $this->objverification=new Verificacion();

    }

    public function generateCode($tipo){

        $getUser=null;

        $session=session();

        if($this->request->getMethod()==="POST"){

            $mail = $this->request->getPost("mail");

            $getUser=$this->objusers->getUser(["email" => $mail]);

            if($getUser){
                
                $data=[
                    "user_id" => $getUser[0]["ID_usuario"],
                    "user_email" => $mail,
                ];
                $session->set($data);
            }

        }else{

            $getUser=$this->objusers->getUser(["ID_usuario" => $session->get("user_id")]);

            $mail=$session->get("user_email");

        }

        if($getUser){

            $user_id=$getUser[0]["ID_usuario"];

            $codigo = \Config\Services::generateCode();

            $this->objverification->insertCode($user_id,$codigo,$tipo);

            if($tipo=="verificacion"){
                \Config\Services::sendEmail($mail,"Tu codigo para verificarte en el sitio","<h1>Utiliza este codigo: <b>".$codigo."</b> Para verificar tu usuario</h1>");
            }else{
                \Config\Services::sendEmail($mail,"Tu codigo para verificarte en el sitio","<h1>Utiliza este codigo: <b>".$codigo."</b> Para cambiar tu contraseña</h1>");
            }

            return view("verification");

        }else{
            echo "Ha ocurrido un error";
        }



    }

    public function verifyUser(){

        $session= session();

        $post_code=$this->request->getPost("code");

        $code=$this->objverification->getCode(["codigo" => $post_code, "ID_usuario" => $session->get("user_id"), "usado" => 0]);

        if($code){

            if($code[0]['tipo']=="recuperar_contrasena"){

                $this->objverification->updateCode(["ID_codigo" => $code[0]["ID_codigo"]]);

                return view("reset_pw");

            }else{
                $this->objverification->updateCode(["ID_codigo" => $code[0]["ID_codigo"]]);

                $this->objusers->verifyUser($session->get("user_id"));

                $session->set("verificado",true);

                return redirect()->to(base_url("/"));
            }

            

        }else{
            echo "Código expirado o no válido";
        }

    }

    public function resetPwView(){
        return view("email");

    }

}