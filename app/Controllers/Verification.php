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

    public function generateCode(){

        $session = session();

        $getUser=$this->objusers->getUser(["ID_usuario" => $session->get("user_id")]);

        if($getUser){

            $hex = bin2hex(random_bytes(3)); // Genera 6 caracteres hexadecimales
            $number = base_convert($hex, 16, 10);
            $codigo = substr($number, 0, 6);

            $this->objverification->insertCode($session->get("user_id"),$codigo,"verificacion");

            \Config\Services::sendEmail($session->get("user_email"),"Tu codigo para verificarte en el sitio","<h1>Utiliza este codigo: <b>".$codigo."</b> Para verificar tu usuario</h1>");

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

            $this->objverification->updateCode(["ID_codigo" => $code[0]["ID_codigo"]]);

            $this->objusers->verifyUser($session->get("user_id"));

            $session->set("verificado",1);

            return redirect()->to(base_url("/"));

        }else{
            echo "Código expirado o no válido";
        }

    }

}