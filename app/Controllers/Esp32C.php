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
            echo "Datos recibidos: param1=$param1, param2=$param2";
        } else {
            echo "Datos no recibidos";
        }
        
    
    }

    public function sendIR() {
        $esp32IP = '10.81.11.233'; // Cambia esto por la IP de tu ESP32
        $url = "http://$esp32IP/sendIR";

        $response = file_get_contents($url); // Envía la solicitud GET

        if ($response === FALSE) {
        // Manejo del error
            echo "Error al enviar la solicitud.";
        } else {
            echo $response; // Muestra la respuesta de la ESP32
        }
    }

}