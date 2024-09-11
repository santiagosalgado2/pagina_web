<?php

namespace App\Controllers;

use App\Models\Usuarios;
use App\Models\Esp32;


class Home extends BaseController
{
    public function index(): string
    {
        $session = session();

        if($session->get("verificado")){
            $obj=new Esp32();
            $datos=$obj->getEsp32byUser($session->get("user_id"));
            return view("inicio", ["datos" => $datos]);
        }else{
            return view('login');
        }

        
    }

    public function inicio(){
        return view("inicio");
    }


    
}
