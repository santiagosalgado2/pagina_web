<?php

namespace App\Controllers;
#INCLUYE LOS MODELOS NECESARIOS
use CodeIgniter\Controller;

use \App\Models\Manejador;
use \App\Models\Esp32;


class Handle extends BaseController{

    public function receiveEsp(){

        #ESTE CONTROLADOR ES EJECUTADO POR LA ESP32 Y SE UTILIZA PARA FINALIZAR EL PROCESO DE VINCULACIÓN
        #LA ESP ENVIA MEDIANTE POST EL CODIGO IDENTIFICADOR Y SU DIRECCION IP UNA VEZ CONECTADA A WIFI

        $code= $this->request->getPost('code');

        $ip = $this->request->getPost('ipAddress');

        $ruta= WRITEPATH . 'data/' . $code . '.csv';

        $data = [];

        $espmodel = new Esp32();

        $handlemodel = new Manejador();

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

            return 'Esp32 vinculada con exito';
            
        }else{


            #SI EL ARCHIVO NO SE ENCUENTRA QUIERE DECIR QUE EL ESP YA ESTA REGISTRADO EN LA BD. SE BUSCA EN LA BD EL ESP32 POR SU CODIGO
            #Y SE ACTUALIZA LA DIRECCION IP EN CASO DE QUE SEA NECESARIO HACERLO

            $esp=$espmodel->getEsp32byCode($code);

            if($esp[0]['direccion_ip']!==$ip){

                $update=$espmodel->updateEsp32(['direccion_ip' => $ip],['codigo' => $code]);

                return 'Ip cambiada en la bd '.$ip;

            }

            $action=$handlemodel->getActionQuery($code);

            if(!empty($action)){

                $action_data=$handlemodel->getActionData($action[0]['ID_solicitud']);

                if(!empty($action_data)){

                    $response=array();

                    if($action[0]['ID_accion']==1 && $action[0]['estado']==0  && !empty($action_data[0]['valor'])){

                        $response["accion"] = "emitir_senal";

                        $response["codigo_raw"] = $action_data[0]["valor"];

                        return json_encode($response);

                    }

                    elseif($action[0]['ID_accion']==2 && $action[0]['estado']==0 && !empty($action_data[0]['clave']) && empty($action_data[0]['valor'])){

                        $response["accion"] = "grabar_senal";

                        return json_encode($response);


                    }else{
                        return "nada para hacer";
                    }

                }else{
                    return "nada para hacer";
                }

            }else{
                return "nada para hacer";
            }


        }

        

    }

    public function updateSignal(){

        $code= $this->request->getPost('code');

        $irCode1 = str_replace(" ",",",$this->request->getPost('irCode'));

        $irCode2 = preg_replace('/^\d+\s/', '', $irCode1);

        $irCode3 = substr($irCode2, 1);

        $irCode = str_replace(["\r", "\n"], '', subject: $irCode3);

        $handlemodel = new Manejador();

        if($action=$handlemodel->getActionQuery($code)){
            $data=$handlemodel->getActionData($action[0]['ID_solicitud']);

            if(empty($data[0]["valor"])){
                $handlemodel->updateActionData($action[0]['ID_solicitud'],$irCode);

                return "Señal actualizada";
            }else{
                return 'No se ha encontrado una solicitud de actualizacion de señal';
            }
        }else{
            return 'No hay accion solicitada';
        }

    }

    public function deleteData(){
        $code= $this->request->getPost('code');

        $handlemodel = new Manejador();

        if($action=$handlemodel->getActionQuery($code)){
            $handlemodel->deleteActionData($action[0]['ID_solicitud']);

            return 'informacion eliminada';
        }
    }



}