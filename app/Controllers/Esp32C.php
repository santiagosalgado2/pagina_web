<?php 

namespace App\Controllers;

use App\Models\Esp32;

class Esp32C extends BaseController{

    
    
    public function devicesbyEsp(){
        
        $espmodel=new Esp32;

        $session = session();

        $esp_id=$this->request->getPost("esp_id");

        $user_id =$session->get("user_id");

        $datos=$espmodel->getDevicesbyEsp($esp_id,$user_id);

        return view("devices",["datos"=>$datos]);

    }

    public function receiveConn(){
        $param1 = $this->request->getPost('param1');
        $param2 = $this->request->getPost('param2');
        
        // Log de depuración
        log_message('info', "param1: $param1");
        log_message('info', "param2: $param2");
        
        if ($param1 && $param2) {
            return $this->response->setStatusCode(200)->setBody("Datos recibidos: param1=$param1, param2=$param2");
        } else {
            return $this->response->setStatusCode(400)->setBody("Datos no recibidos");
        }
    
    }

}