<?php

namespace App\Controllers;
#INCLUYE LOS MODELOS NECESARIOS
use App\Models\Acceso_usuarios;
use App\Models\Dispositivos;
use App\Models\Manejador;
use CodeIgniter\Controller;

class Devices extends BaseController{

    public function newDeviceView(){
        return view('new_device');
    }

    public function newDevice(){

        $name=$this->request->getPost('name');

        $deviceType = $_POST['device_type'];

        $type=0;

        $devicemodel=new Dispositivos;

        $user_access=new Acceso_usuarios();

        switch ($deviceType) {
            case 'tv':
                $type=2;
                break;
            case 'aire_acondicionado':
                $type=1;
                break;
            case 'ventilador':
                $type=3;
                break;
            default:
                echo "Error";
                break;
        }

        $device=$devicemodel->insertDevice($name,$type,session()->get('esp_id'));

        $user_access->insertAccess(session()->get('user_id'),$device);


        return redirect()->back();

    }

    public function editDeviceview(){
        $id=$this->request->getPost('id');
        $devicemodel=new Dispositivos;

        $device=$devicemodel->user_has_permission($id,session()->get('user_id'));

        if(empty($device)){

            return redirect()->back();

        }else{

            return view('edit_device',['device'=>$device]);

        }

    }

    public function updateDevice(){

        $name=$this->request->getPost('name');

        $id=$this->request->getPost('id');

        $deviceType = $_POST['device_type'];

        $type=0;

        $devicemodel=new Dispositivos;

        switch ($deviceType) {
            case 'tv':
                $type=2;
                break;
            case 'aire_acondicionado':
                $type=1;
                break;
            case 'ventilador':
                $type=3;
                break;
            default:
                echo "Error";
                break;
        }

        if(!isset($name) OR !isset($id) OR !isset($type)){

            return redirect()->back();

        }else{
            
            $device=$devicemodel->updateDevice($name,$type,$id);

            return redirect()->to(base_url('/devices'));
        }

    }

    public function deleteDevice($id){

        $devicemodel=new Dispositivos;
        $aumodel=new Acceso_usuarios;

        $device=$devicemodel->user_has_permission($id,session()->get('user_id'));

        if(empty($device)){

            return redirect()->back();

        }else{

            $devicemodel->deleteDevice($id);
            $aumodel->deleteaccessbydevice($id);
            $devicemodel->deleteSignalsbyDevice($id);
            return redirect()->to(base_url('/devices'));

        }

    }

    public function insertarSenal(){
        $senal=$this->request->getJSON()->irCode;

        $dispositivo=$this->request->getJSON()->deviceId;

        $funcion=$this->request->getJSON()->functionId;

        $devicemodel=new Dispositivos;

        $handlemodel=new Manejador;

        $device=$devicemodel->user_has_permission($dispositivo,session()->get('user_id'));

        if(empty($device)){

            return redirect()->back();
        }else{
            if($devicemodel->getSignal($dispositivo,$funcion)){
                if($devicemodel->updateSignal($senal,$dispositivo,$funcion)){
                    $handlemodel->deleteActionData(session()->get('action_id'));

                    return $this->response->setStatusCode(200)->setBody('Señal guardada correctamente.');
                }else{
                    return $this->response->setStatusCode(500)->setBody('Error al guardar la señal.');
                }
            }else{
                if($devicemodel->insertSignal($senal,$dispositivo,$funcion)){
                    $handlemodel->deleteActionData(session()->get('action_id'));

                    return $this->response->setStatusCode(200)->setBody('Señal guardada correctamente.');
                }else{
                    return $this->response->setStatusCode(500)->setBody('Error al guardar la señal.');
                }
            }
        }

    }

    public function verifySignal(){
        $funcion=$this->request->getJSON()->functionId;

        $dispositivo=$this->request->getJSON()->deviceId;

        $devicemodel=new Dispositivos;

        $device=$devicemodel->user_has_permission($dispositivo,session()->get('user_id'));

        if(empty($device)){

            return redirect()->back();
        }else{
            if($devicemodel->getSignal($dispositivo,$funcion)){
                return $this->response->setStatusCode(200)->setBody('Señal ya existe.');
            }else{
                return $this->response->setStatusCode(500)->setBody('Señal no existe.');
            }
        }

    }

}