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

}