<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios extends Model{
    public function getUser($data){
        $usuario=$this->db->table("usuarios");
        $usuario->where($data);
        return $usuario->get()->getResultArray();
    }
}