<?php

namespace App\Controllers;

use App\Models\Usuarios;



class Mail extends BaseController{

    private $session;

    private $usermodel;

    private $objemail;

    public function __construct(){

        $this->session = session();

        $this->usermodel=new Usuarios();

        $this->objemail= \Config\Services::email();

    }

    public function sendEmail(){

        $user=$this->usermodel->getUser(["ID_usuario" => $this->session->get("user_id")]);

        $email=$user[0]["email"];

        if($email){

            $this->objemail->setTo($email);

            $this->objemail->setSubject("hola");

            $this->objemail->setMessage('<h1 style= "color:red;"><center>HOLA</h1></center>');

        }

        if ($this->objemail->send()) {
            echo 'Correo enviado exitosamente.';
        } else {
            echo 'Hubo un problema al enviar el correo.';
            // Imprimir el depurador para ver el error
            echo $this->objemail->printDebugger();
        }

    }

}