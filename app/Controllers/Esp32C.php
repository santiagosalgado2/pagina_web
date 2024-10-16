<?php 

namespace App\Controllers;

use App\Models\Esp32;

class Esp32C extends BaseController{

    public function devicesbyEsp(){
        
        $espmodel=new Esp32;

        $session = session();

        $esp_id=$this->request->getPost("esp_id");

        $user_id =$session->get("user_id");

        $esp=$espmodel->getEsp32($esp_id);

        $datos=$espmodel->getDevicesbyEsp($esp_id,$user_id);

        $session->set('esp_ip',$esp[0]['direccion_ip']);

        $session->set('esp_id',$esp_id);

        return view("devices",["datos"=>$datos]);

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

        $espmodel = new Esp32();

        if(file_exists($ruta)){
            if (($handle = fopen($ruta, 'r')) !== false) {
                while (($row = fgetcsv($handle)) !== false) {
                    $data[] = $row;
                }
                fclose($handle);
            }
    
            list($vcode, $id, $mail, $location) = $data[0];
    
            
    
            $espid=$espmodel->insertEsp($ip,$location,$id,$vcode);
    
            if($espid){
                \Config\Services::sendEmail($mail,"Dispositivo vinculado exitosamente","<h1>Su dispositivo fue vinculado con exito, vuelve al inicio de la pagina para poder configurarlo a gusto</h1>");
                
            }else{
                \Config\Services::sendEmail($mail,"Hubo un error al vincular tu esp","<h1>Ha ocurrido un error. Intente nuevamente</h1>");
            }

            unlink($ruta);
        }else{

            $esp=$espmodel->getEsp32byCode($code);

            if($esp[0]['direccion_ip']!==$ip){

                $update=$espmodel->updateEsp32(['direccion_ip' => $ip],['codigo' => $code]);

                return 'Ip cambiada en la bd '.$ip;

            }else{
                return 'Nada para hacer';
            }

        }

        

    }


    #FUNCIONES DE PRUEBA
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
        $esp32IP = $this->request->getPost('ip');// Cambia esto por la IP de tu ESP32
        $url = "http://$esp32IP/sendIR";
        $signal1 = $this->request->getPost('signal1');
        $signal2 = $this->request->getPost('signal2');

        echo $esp32IP;

        $client = \Config\Services::curlrequest();

        // Envía ambas señales a la ESP32
        $response = $client->post($url, [
            'form_params' => [
                'signal1' => $signal1,
                'signal2' => $signal2
            ]
        ]);

        // Verifica que la solicitud haya sido exitosa
        if ($response->getStatusCode() === 200) {
            return $this->response->setStatusCode(200)->setBody('Señales enviadas correctamente.');
        } else {
            return $this->response->setStatusCode(500)->setBody('Error al enviar las señales.');
        }
    }

    public function control_view(){
        return view('tele2');
    }
    public function air_view(){
        return view('aire');
    }


    public function receiveIrCode()
    {
        $irCode = $this->request->getPost('irCode');

        $code= $this->request->getPost('code');

        $filePath = WRITEPATH . 'data/'.$code.'.csv';

        $file = fopen($filePath, 'a');
        if ($file) {
            fputcsv($file, [$irCode]);
            fclose($file);
            return $this->response->setStatusCode(200)->setBody('Código IR recibido y guardado.');
        } else {
            return $this->response->setStatusCode(500)->setBody('Error al guardar el código IR.');
        }
    }

    public function ver_senales(){

        $espmodel=new Esp32;

        $esp=$espmodel->getEsp32(session()->get('esp_id'));

        $filePath = WRITEPATH . 'data/'.$esp[0]['codigo'].'.csv';

        if (file_exists($filePath)) {
            if (($handle = fopen($filePath, 'r')) !== false) {
                $data = [];
                while (($row = fgetcsv($handle)) !== false) {
                    $data[] = $row[0]; // Asumiendo que solo hay una columna por fila
                }
                fclose($handle);
                
                register_shutdown_function(function() use ($filePath) {
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                });
                

                return $this->response->setStatusCode(200)->setJSON($data);
                                
                
            }else {
                return $this->response->setStatusCode(500)->setBody('No se pudo abrir el archivo.');
            }
        } else {
            return $this->response->setStatusCode(404)->setBody('El archivo no existe.');
        }
    }
    
    public function ver_senales_vista(){
        return view('senales');
    }
    public function ventilador_view(){
        return view('ventilador');
    }

}