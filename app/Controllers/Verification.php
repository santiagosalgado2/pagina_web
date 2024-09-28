<?php

namespace App\Controllers;

use App\Models\Usuarios;

use App\Models\Verificacion;

class Verification extends BaseController{

    private $objusers;

    private $objverification;

    #SE INCLUYEN ATRIBUTOS DE LA CLASE QUE CONTIENEN LA INSTANCIA DE LOS MODELOS NECESARIOS
    public function __construct(){

        $this->objusers=new Usuarios();

        $this->objverification=new Verificacion();

    }

    /*
    FUNCION UTILIZADA PARA GENERAR CODIGOS DE VERIFICACION, CREACION DE CONTRASEÑA Y RECUPERACION DE CONTRASEÑA
    */
    public function generateCode($tipo){
        #SE INICIALIZA 2 VARIABLES, LA DE SESION Y GETUSER, QUE SERA USADA MAS ADELANTE EN LA FUNCION
        $getUser=null;

        $session=session();
        #SI SE ACCEDE A ESTA FUNCION A TRAVES DE UN FORMULARIO (POST), QUIERE DECIR QUE EL USUARIO OLVIDO SU CONTRASEÑA Y DESEA REESTABLECERLA
        if($this->request->getMethod()==="POST"){

            $mail = $this->request->getPost("mail");

            $getUser=$this->objusers->getUser(["email" => $mail]);

            #SE OBTIENE EL MAIL COLOCADO POR ELUSUARIO Y SE BUSCA SI ESTA REGISTRADO EN LA BD

            if($getUser){
                
                $data=[
                    "user_id" => $getUser[0]["ID_usuario"],
                    "user_email" => $mail,
                ];
                $session->set($data);
            }
        
        #SI SE ACCEDE A TRAVES DE GET, QUIERE DECIR QUE EL USUARIO DESEA VERIFICARSE Y LOS DATOS DE SESION YA ESTAN SETEADOS
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
                \Config\Services::sendEmail($mail,"Tu codigo para cambiar tu contraseña","<h1>Utiliza este codigo: <b>".$codigo."</b> Para cambiar tu contraseña</h1>");
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