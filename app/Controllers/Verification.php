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

        $session = session();

        $getUser=$this->objusers->getUser(["ID_usuario" => $session->get("user_id")]);

        if($getUser){

            $codigo = \Config\Services::generateCode();

            $this->objverification->insertCode($session->get("user_id"),$codigo,$tipo);

            if($tipo=="verificacion"){
                \Config\Services::sendEmail($session->get("user_email"),"Tu codigo para verificarte en el sitio","<h1>Utiliza este codigo: <b>".$codigo."</b> Para verificar tu usuario</h1>");
            }else{
                \Config\Services::sendEmail($session->get("user_email"),"Tu codigo para verificarte en el sitio","<h1>Utiliza este codigo: <b>".$codigo."</b> Para cambiar tu contraseñaui</h1>");
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