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

}