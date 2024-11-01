<?php 

namespace App\Controllers;

use App\Models\Esp32;

class Esp32C extends BaseController{

    public function devicesbyEsp(){
        #FUNCION QUE OBTIENE LOS DISPOSTIVOS VINCULADOS A UN ESP32 SELECCIONADO POR EL USUARIO
        #LOS DATOS SE GUARDAN EN LA SESION DEL USUARIO PARA PODER SER UTILIZADOS EN OTRAS FUNCIONES
        #SE REDIRIGE A LA RUTA DEVICES QUE EJECUTARA EL CONTROLADOR QUE HARA LA CONSULTA A LA BD A TRAVES DEL MODELO
        #ESTO SE HACE ASI PORQUE SINO CUANDO EL USUARIO VUELVE A LA PAGINA PRINCIPAL, EL NAVEGADOR PIERDE LOS DATOS DEL FORMULARIO
        $session = session();

        $esp_id = $this->request->getPost("esp_id");

        $esp_ip= $this->request->getPost('esp_ip');

        $session->set('esp_id',$esp_id);

        $session->set('esp_ip',$esp_ip);

        return redirect()->to('/devices'); // Redirigir a la vista devices

    }

    public function devices(){
        $espmodel = new Esp32;
        $session = session();
        $esp_id = $session->get('esp_id'); 
    
        
        $datos = $espmodel->getDevicesbyEsp($esp_id,$session->get('user_id'));

        $esp=$espmodel->getEsp32($esp_id);
        
        #TRAE LOS DATOS DE LOS DISPOSITIVOS Y DE LA ESP SELECCIONADA POR EL USUARIO Y LO ENVIA A LA VISTA DEVICES
        return view("devices", ["datos" => $datos, "esp" => $esp]);

    }


    public function newEspview(){
        #VISTA PARA VINCULAR UN NUEVO ESP32
        return view('new_esp');
    }

    public function insertNewesp(){
        #CUNADO EL USUARIO COMPLETA EL FORMULARIO DE VINCULACION DE UN NUEVO ESP32, SE OBTIENE EL CODIGO Y LA UBICACION DEL FORMULARIO, Y EL ID Y MAIL DE USUARIO ALMACENADOS
        #EN LA SESION
        $code = $this->request->getPost('code');
        $id = session()->get('user_id');
        $mail=session()->get('user_email');
        $location = $this->request->getPost('location');
        
        #SE CREA UN ARCHIVO CSV QUE VA A TENER COMO NOMBRE EL CODIGO DEL ESP32 Y COMO CONTENIDO LOS DATOS OBTENIDOS DEL FORMULARIO Y DE LA SESION
        $fileName = "{$code}.csv";
        $filePath = WRITEPATH . 'data/' . $fileName;
    
        $data = [$code, $id, $mail, $location];
    
        $file = fopen($filePath, 'a');
        if ($file) {
            fputcsv($file, $data);
            fclose($file);
            #SE ABRE EL ARCHIVO CSV (EN CASO DE QUE NO EXISTA, SE CREA AUTOMATICAMENTE) Y SE ESCRIBEN LOS DATOS OBTENIDOS
        } 

        #SE RETORNA AL USUARIO A UNA VISTA QUE LE DETALLA COMO TIENE QUE HACER PARA CONECTAR LA PLACA A WIFI

        return view('esp_instructions.php');
    }

    public function receiveEsp(){

        #ESTE CONTROLADOR ES EJECUTADO POR LA ESP32 Y SE UTILIZA PARA FINALIZAR EL PROCESO DE VINCULACIÓN
        #LA ESP ENVIA MEDIANTE POST EL CODIGO IDENTIFICADOR Y SU DIRECCION IP UNA VEZ CONECTADA A WIFI

        $code= $this->request->getPost('code');

        $ip = $this->request->getPost('ipAddress');

        $ruta= WRITEPATH . 'data/' . $code . '.csv';

        $data = [];

        $espmodel = new Esp32();

        if(file_exists($ruta)){

            #SI EL ARCHIVO EXISTE, QUIERE DECIR QUE EL USUARIO HA COMPLETADO EL FORMULARIO DE VINCULACION Y DESEA REALIZAR UNA VINCULACION DE UN NUEVO ESP32
            #ESTE CONTROLADOR VA A BUSCAR EL ARCHIVO CSV QUE TENGA COMO NOMBRE EL CODIGO DE LA ESP32 Y VA A ITERAR LOS DATOS DEL ARCHIVO

            if (($handle = fopen($ruta, 'r')) !== false) {
                while (($row = fgetcsv($handle)) !== false) {
                    $data[] = $row;
                }
                fclose($handle);
            }
    
            list($vcode, $id, $mail, $location) = $data[0]; #LISTA DE LOS DATOS OBTENIDOS DEL ARCHIVO CSV

            #SE INSERTA LA ESP A LA BD Y SE NOTIFICA AL USUARIO POR MAIL EL RESULTADO DE LA VINCULACION
            $espid=$espmodel->insertEsp($ip,$location,$id,$vcode);
    
            if($espid){
                \Config\Services::sendEmail($mail,"Dispositivo vinculado exitosamente","<h1>Su dispositivo fue vinculado con exito, vuelve al inicio de la pagina para poder configurarlo a gusto</h1>");
                
            }else{
                \Config\Services::sendEmail($mail,"Hubo un error al vincular tu esp","<h1>Ha ocurrido un error. Intente nuevamente</h1>");
            }

            unlink($ruta);
        }else{


            #SI EL ARCHIVO NO SE ENCUENTRA QUIERE DECIR QUE EL ESP YA ESTA REGISTRADO EN LA BD. SE BUSCA EN LA BD EL ESP32 POR SU CODIGO
            #Y SE ACTUALIZA LA DIRECCION IP EN CASO DE QUE SEA NECESARIO HACERLO

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

    public function sendIR() {
        #FUNCION POR LA CUAL SE ENVIAN LAS SEÑALES IR A LA ESP32 DESDE LA PAGINA WEB
        #USANDO JS SE ENVIAN MEDIANTE POST LA IP DEL ESP32 Y LA SEÑAL EN CRUDO
        #EL TRIM SE USA PARA ELIMINAR ESPACIOS EN BLANCO Y QUE LA URL NO TENGA PROBLEMAS
        $esp32IP = trim($this->request->getPost('ip'));  
        $signal = $this->request->getPost('signal');
        $url = "http://$esp32IP/sendIR";    
        
        if (!$esp32IP || !$signal) {
            return $this->response->setStatusCode(400)->setBody('Faltan parámetros.');
        }

        else{
            
            #EN CASO DE QUE EL CONTROLADOR HAYA RECIBIDO CORRECTAMENTE LOS DATOS, SE CREA UN CLIENTE CURL, QUE ES UNA HERRAMIENTA QUE PERMITE ENVIAR SOLICITUDES HTTP A UNA URL
            #Y RECIBIR UN RESULTADO. ESTA HERRAMIENTA VIENE INCLUIDA EN CODEIGNITER

            $client = \Config\Services::curlrequest();
            
            #ENVIA EL PARAMETRO 'PLAIN' QUE TENDRA COMO VALOR LA SEÑAL EN CRUDO QUE SE DESEA EMITIR
            #LA ESP RECIBIRA ESTE DATO Y EMITIRA LA SEÑAL CORRESPONDIENTE
            $response = $client->post($url, [
                'form_params' => [
                    'plain' => $signal
                ]
            ]);
        
            // Verifica que la solicitud haya sido exitosa
            if ($response->getStatusCode() === 200) {
                return $this->response->setStatusCode(200)->setBody('Señales enviadas correctamente.');
            } else {
                return $this->response->setStatusCode(500)->setBody('Error al enviar las señales.');
            }
        }
        


    }
    
    

    public function control_view(){
        return view('tele2');
    }
    public function air_view(){
        return view('aire');
    }

    public function ventilador_view(){
        return view('ventilador');
    }


    
    #LAS SIGUIENTES 2 FUNCIONES SON DE PRUEBA Y LAS UTILIZAMOS PARA QUE CUANDO LA ESP RECIBA UNA SEÑAL INFRARROJA, ENVIE SU CODIGO A LA PAGINA Y EL USUARIO LO VEA EN PANTALLA
    public function receiveIrCode()
    {
        #EL ESP ENVIA EL CODIGO HEXADECIMAL DE LA SEÑAL (ACTUALMENTE NO ESTAMOS TRABAJANDO CON SEÑALES EN FORMA HEXADECIMAL SINO EN FORMATO RAW (CRUDO) PERO SOLO ERA UNA PRUEBA)
        #LA ESP TAMBIEN ENVIA SU CODIGO IDENTIFICADOR, EL MISMO QUE SE USA PARA LA VINCULACION
        $irCode = $this->request->getPost('irCode');

        $code= $this->request->getPost('code');

        $filePath = WRITEPATH . 'data/'.$code.'.csv';

        $file = fopen($filePath, 'a');
        if ($file) {
            #SE CREA EL ARCHIVO CSV Y SE INSERTA EL ARCHIVO
            fputcsv($file, [$irCode]);
            fclose($file);
            return $this->response->setStatusCode(200)->setBody('Código IR recibido y guardado.');
        } else {
            return $this->response->setStatusCode(500)->setBody('Error al guardar el código IR.');
        }
    }

    public function ver_senales(){
        #ESTA FUNCION BUSCA EL ARCHIVO CSV QUE CONTIENE LAS SEÑALES IR RECIBIDAS POR LA ESP32
        #EL ARCHIVO LO BUSCA POR EL CODIGO IDENTIFICADOR DE LA ESP QUE ESTA ALMACENADO EN LA SESION DEL USUARIO
        $espmodel=new Esp32;

        $esp=$espmodel->getEsp32(session()->get('esp_id'));

        $filePath = WRITEPATH . 'data/'.$esp[0]['codigo'].'.csv';

        if (file_exists($filePath)) {
            if (($handle = fopen($filePath, 'r')) !== false) {
                $data = [];
                while (($row = fgetcsv($handle)) !== false) {
                    #ITERA LAS SEÑALES Y LAS GUARDA EN UN ARRAY
                    $data[] = $row[0];
                }
                fclose($handle);
                
                // register_shutdown_function(function() use ($filePath) {
                //     #ESTA FUNCION SE EJECUTA CUANDO EL CONTROLADOR DEJA DE SER EJECUTADO
                //     #CUANDO EL USUARIO SALGA DE LA PAGINA, SE ELIMINA EL ARCHIVO CSV
                //     if (file_exists($filePath)) {
                //         unlink($filePath);
                //     }
                // });

                #DESCOMENTANDO ESTO, UNA VEZ QUE SE RECIBE UNA SEÑAL SE BORRA EL CSV POR LO QUE SOLO ES POSIBLE VER UNA SEÑAL A LA VEZ
                
                #RETORNA LAS SEÑALES EN FORMATO JSON PARA SER PROCESADAS POR UNA FUNCION DE JS
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


}