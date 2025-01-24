<?php

namespace App\Models;


use CodeIgniter\Model;

class Dispositivos extends Model{

    public function insertDevice($name,$type,$esp_id){
        $tabla=$this->db->table('dispositivos');
        $data = array(
            "nombre"=>$name,
            "ID_tipo"=>$type,
            "ID_esp32"=>$esp_id
        );
        $tabla->insert($data);

        return $this->db->insertID();
    }

    public function user_has_permission($device,$user){

        $tabla=$this->db->table('dispositivos d');

        $tabla->join('acceso_usuarios au','au.ID_dispositivo=d.ID_dispositivo');

        $tabla->join('usuarios u','u.ID_usuario=au.ID_usuario');

        $tabla->where(['d.ID_dispositivo'=>$device,'u.ID_usuario'=>$user]);

        return $tabla->get()->getResultArray();

    }

    public function updateDevice($name,$type,$id){

        $tabla=$this->db->table('dispositivos');

        $data = array(
            "nombre"=>$name,
            "ID_tipo"=>$type
        );

        $tabla->where('ID_dispositivo',$id);

        $tabla->update($data);

    }

    public function deleteDevice($id){

        $tabla=$this->db->table('dispositivos');

        $tabla->where('ID_dispositivo',$id);

        $tabla->delete();

        $tabla2=$this->db->table('acceso_usuarios');

        $tabla2->where('ID_dispositivo',$id);

        $tabla2->delete();

    }

    public function insertSignal($signal,$device,$function){
        $tabla=$this->db->table('senalesir');
        $data = array(
            "codigo_hexadecimal	"=>$signal,
            "ID_dispositivo"=>$device,
            "ID_funcion"=>$function
        );

        $tabla->insert($data);
    }

}