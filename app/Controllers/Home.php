<?php

/*
GRAN PARTE DEL CÓDIGO ESTÁ ESCRITO POR NOSOTROS, LOGICAMENTE HEMOS SACADO PARTES DE PÁGINAS O DE IA AL ESTAR INVESTIGANDO FUNCIONES TANTO DE CODEIGNITER 
COMO DE PHP (COMO HASHEAR Y VERIFICAR CONTRASEÑAS, UTILIZAR SERVICIOS, ENVIAR EMAILS AUTOMATICOS, UTILIZAR QUERY BUILDER PARA LOS MODELOS, ETC.), 
QUE NO SABÍAMOS COMO UTILIZAR PERO QUE NECESITABAMOS PARA PROGRAMAR DISTINTAS FUNCIONES. TODOS LOS COMENTARIOS TAMBIÉN SERÁN REALIZADOS POR NOSOTROS CON NUESTRAS
PALABRAS PARA FACILITAR LA EXPLICACIÓN DEL CODIGO LUEGO Y GARANTIZAR QUE LOS 2 ENTENDEMOS COMO FUNCIONA LA PROGRAMACIÓN DEL SITIO WEB.
*/

namespace App\Controllers;

use App\Models\Usuarios;
use App\Models\Esp32;


class Home extends BaseController
{
    public function index(): string
    {
        $session = session();

        if($session->get("verificado")){ #VERIFICA SI EL USUARIO ESTA VERIFICADO Y HA INICIADO SESIÓN
            $obj=new Esp32(); #INSTANCIA EL MODELO DE ESP32 PARA BUSCAR LOS DISPOSITIVOS A LOS QUE TIENE ACCESO EL USUARIO
            if($session->get('tipo')==2){
                $datos=$obj->getEsp32byUser($session->get("user_id"));
            }else{
                $datos=$obj->getEsp32byAdmin($session->get("user_id"));
            }
            
            return view("inicio", ["datos" => $datos]); #ENVIA LOS DATOS A LA VISTA 'INICIO' CON LOS ESP A LOS QUE TIENE ACCESO EL USUARIO
        }else{
            return view('login'); #EN CASO DE QUE EL USUARIO NO HAYA INICIADO SESION, LO ENVIA AL LOGIN
        }

        
    }

    public function inicio(){
        return view("inicio");
    }

    public function viewPrueba(){
        return view("prueba");
    }


    
}
