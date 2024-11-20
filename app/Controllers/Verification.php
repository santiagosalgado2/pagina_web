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
    FUNCION UTILIZADA PARA GENERAR CODIGOS DE VERIFICACION Y RECUPERACION DE CONTRASEÑA
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
            }else{
                $session->setFlashdata("error","El mail ingresado no se encuentra registrado");
                return redirect()->to(base_url("/"));
            }
        
        #SI SE ACCEDE A TRAVES DE GET, QUIERE DECIR QUE EL USUARIO DESEA VERIFICARSE Y LOS DATOS DE SESION YA ESTAN SETEADOS
        }else{
            #SE BUSCA EL USUARIO POR EL ID DE SESION Y SE GUARDA SU MAIL TAMBIEN ALMACENADA EN LA SESION
            $getUser=$this->objusers->getUser(["ID_usuario" => $session->get("user_id")]);

            $mail=$session->get("user_email");

        }
        
        if($getUser){
            #SI EL USUARIO SE ENCUENTRA:
            $user_id=$getUser[0]["ID_usuario"]; #SE ALMACENA SU ID EN UNA VARIABLE

            $codigo = \Config\Services::generateCode(); #SE GENERA UN CODIGO UTILIZANDO ESTA FUNCION PROGRAMADA COMO SERVICIO

            $this->objverification->insertCode($user_id,$codigo,$tipo); #SE ALMACENA EL CODIGO EN LA BD

            #SE ENVIA UN EMAIL AL USUARIO CON UNA FUNCION TAMBIEN PROGRAMADA COMO SERVICIO, DEPENDIENDO SI ES DE TIPO VERIFICACION
            #O RECUPERACION DE CONTRASEÑA
            if($tipo=="verificacion"){
                \Config\Services::sendEmail($mail,"Tu codigo para verificarte en el sitio","<h1>Utiliza este codigo: <b>".$codigo."</b> Para verificar tu usuario</h1>");
            }
            elseif($tipo=="cambiar_usuario"){
                \Config\Services::sendEmail($mail,"Tu codigo para cambiar tu nombre de usuario","<h1>Utiliza este codigo: <b>".$codigo."</b> Para cambiar tu nombre de usuario</h1>");

            }
            
            else{
                \Config\Services::sendEmail($mail,"Tu codigo para cambiar tu contraseña","<h1>Utiliza este codigo: <b>".$codigo."</b> Para cambiar tu contraseña</h1>");
            }
            #SE RETORNA A LA VISTA PARA QUE COLOQUE EL CODIGO ENVIADO
            return view("verification");

        }else{
            echo "Ha ocurrido un error";
        }



    }

    /*
    FUNCION QUE VALIDA SI EL CODIGO INGRESADO POR EL USUARIO COINCIDE CON EL GENERADO, TRABAJANDO TAMBIEN LA LOGICA DEPENDIENDO DEL TIPO
    DE CODIGO
    */
    public function verifyUser(){

        $session= session();

        $post_code=$this->request->getPost("code"); #SE OBTIENE EL CODIGO INGRESADO EN EL FORMULARIO

        #SE BUSCA EL CODIGO EN LA BASE DE DATOS (CADA CODIGO ES UNICO Y NO SE REPITE)
        $code=$this->objverification->getCode(["codigo" => $post_code, "ID_usuario" => $session->get("user_id"), "usado" => 0]);

        #SI SE ENCUENTRA EL CODIGO
        if($code){

            $this->objverification->updateCode(["ID_codigo" => $code[0]["ID_codigo"]]);

            if($code[0]['tipo']=="recuperar_contrasena"){

                return view("reset_pw");

                #SI ES PARA REESTABLECER SU CONTRASEÑA, SE UPDATEA EL CODIGO (SE LO MARCA COMO QUE YA FUE USADO) Y SE LO RETORNA A LA VISTA

            }

            elseif($code[0]['tipo']=="cambiar_usuario"){
                return view('change_user');
            }
            
            else{
                
                $this->objusers->verifyUser($session->get("user_id"));

                $session->set("verificado",true);

                return redirect()->to(base_url("/"));

                #SI ES PARA VERIFICARSE, SE UPDATEA, SE VERIFICA AL USUARIO EN SU SESION Y EN LA BD Y SE LO MANDA AL INICIO DE LA PAGINA
            }

            

        }else{
            #EN CASO DE QUE EL CODIGO NO SE ENCUENTRE O HAYA EXPIRADO (YA QUE AL EXPIRAR, SE ELIMINA AUTOMATICAMENTE DE LA BD POR LO QUE NO SERA ENCONTRADO):
            echo "Código expirado o no válido";
        }

    }

    public function resetPwView(){
        return view("email");
        #FUNCION SIMPLE QUE RETORNA A UNA VISTA PARA QUE EL USUARIO INGRESE SU EMAIL PARA REESTABLECER SU CONTRASEÑA
    }

}