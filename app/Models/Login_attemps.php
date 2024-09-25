<?php

namespace App\Models;

use CodeIgniter\Model;

class Login_attemps extends Model{

    public function insertLoginattemp($id=null,$exitoso,$ip){

        $table=$this->db->table("login_attemps");
        $data=[
            "ID_usuario"=>$id,
            "exitoso"=>$exitoso,
            "direccion_ip"=> $ip
        ];

        $table->insert($data);


    }

}