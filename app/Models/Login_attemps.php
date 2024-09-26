<?php

namespace App\Models;

use CodeIgniter\Model;

class Login_attemps extends Model{

    public function insertLoginattemp($exitoso,$ip,$id=null){

        $table=$this->db->table("login_attemps");
        $data=[
            "ID_usuario"=>$id,
            "exitoso"=>$exitoso,
            "direccion_ip"=> $ip
        ];

        if($id==null){
            $data["ID_usuario"]=null;
        }

        $table->insert($data);


    }

}