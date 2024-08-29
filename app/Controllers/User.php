<?php

namespace App\Controllers;

use App\Models\Usuarios;

class User extends BaseController{
    public function insert(){
        $pw=password_hash("abc",PASSWORD_DEFAULT);
        $data=[
            "nombre_usuario" => "user1",
            "email" => "user@gmail.com",
            "hash_contrasena" => $pw,
            "salt" => null,
            "ID_permiso" => 1,
            "ID_administrador" => null

        ];

        $obj=new Usuarios();
        $new=$obj->insertUser($data);

        echo $new;
    }    
}