<?php

namespace App\Controllers;
#INCLUYE LOS MODELOS NECESARIOS
use App\Models\Acceso_usuarios;
use App\Models\Dispositivos;
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

    public function editDeviceview($id){

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

        $device=$devicemodel->user_has_permission($id,session()->get('user_id'));

        if(empty($device)){

            return redirect()->back();

        }else{

            $devicemodel->deleteDevice($id);

            return redirect()->to(base_url('/devices'));

        }

    }

}