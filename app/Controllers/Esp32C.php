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

}