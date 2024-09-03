<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios extends Model{
    public function getUser($data){

        $usuario=$this->db->table("usuarios");

        $usuario->orWhere($data);

        return $usuario->get()->getResultArray();

    }

    public function insertUser($data){

        $this->db->table("usuarios")->insert($data);

        return $this->db->insertID();
        
    }

    public function verifyUser($id){

        $table=$this->db->table("usuarios");

        $table->where(["ID_usuario" => $id]);

        $table->update(["verificado" => 1]);

    }

    public function updatePw($pw,$id){

        $table=$this->db->table("usuarios");

        $table->where(["ID_usuario" => $id])->update(["hash_contrasena" => $pw]);

        if($this->db->affectedRows() > 0){
            return true;
        }else{
            return false;
        }

    }
}