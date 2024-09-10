<?php

namespace App\Models;

use CodeIgniter\Model;

class Esp32 extends Model{

    private $table;

    public function __construct(){

        $this->table="disp_esp32";

    }

    public function getEsp32byUser($id){

        $builder = $this->db->table('disp_esp32 e');
        $builder->select('u.nombre_usuario, e.ubicacion');
        $builder->join('dispositivos d', 'd.ID_esp32 = e.ID_dispositivo');
        $builder->join('acceso_usuarios au', 'au.ID_dispositivo = d.ID_dispositivo');
        $builder->join('usuarios u', 'u.ID_usuario = au.ID_usuario');
        $builder->where('u.ID_usuario', $id);
        $builder->groupBy('u.ID_usuario, e.ID_dispositivo');
    
        $query = $builder->get();
        return $query->getResultArray();
        

    }

}