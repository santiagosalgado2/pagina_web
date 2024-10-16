<?php

namespace App\Controllers;
#INCLUYE LOS MODELOS NECESARIOS
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

        $devicemodel->insertDevice($name,$type,session()->get('esp_id'));

        echo "Dispositivo vinculado correctamente";

    }

}