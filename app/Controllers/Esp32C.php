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

    public function newEspview(){
        return view('new_esp');
    }

    public function insertNewesp(){

        $code = $this->request->getPost('code');
        $id = session()->get('user_id');
        $mail=session()->get('user_email');
        $location = $this->request->getPost('location');
    
        // Ruta del archivo CSV
        $fileName = "{$code}.csv";
        $filePath = WRITEPATH . 'data/' . $fileName;
    
        $data = [$code, $id, $mail, $location];
    
        $file = fopen($filePath, 'a');
        if ($file) {
            fputcsv($file, $data);
            fclose($file);

        } 

        return view('esp_instructions.php');
    }

    public function receiveEsp(){

        $code= $this->request->getPost('code');

        $ip = $this->request->getPost('ipAddress');

        $ruta= WRITEPATH . 'data/' . $code . '.csv';

        $data = [];
        if (($handle = fopen($ruta, 'r')) !== false) {
            while (($row = fgetcsv($handle)) !== false) {
                $data[] = $row;
            }
            fclose($handle);
        }

        list($vcode, $id, $mail, $location) = $data[0];

        $espmodel = new Esp32();

        $espid=$espmodel->insertEsp($ip,$location,$id,$vcode);

        if($espid){
            \Config\Services::sendEmail($mail,"Dispositivo vinculado exitosamente","<h1>Su dispositivo fue vinculado con exito, vuelve al inicio de la pagina para poder configurarlo a gusto</h1>");
            unlink($ruta);
        }else{
            \Config\Services::sendEmail($mail,"Hubo un error al vincular tu esp","<h1>Eso flaco</h1>");
        }

    }

}