<?php

namespace App\Models;


use CodeIgniter\Model;

class Acceso_usuarios extends Model{

    public function insertAccess($user_id,$device_id){
        
        $tabla=$this->db->table('acceso_usuarios');

        $data=array(
            'ID_usuario' => $user_id,
            'ID_dispositivo' => $device_id
        );

        $tabla->insert($data);

        return $this->db->insertID();

    }

    public function getpermissionid($user){
        $tabla=$this->db->table('acceso_usuarios');

        $tabla->select('*');

        $tabla->where('ID_usuario',$user);

        return $tabla->get()->getResultArray();
    }

}