<?php

namespace App\Controllers;

use App\Models\Usuarios;


class Home extends BaseController
{
    public function index(): string
    {
        $session = session();

        if($session->get("logged_in")){
            return view("inicio");
        }else{
            return view('login');
        }

        
    }

    public function inicio(){
        return view("inicio");
    }


    
}
