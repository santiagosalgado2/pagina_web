<?php

namespace App\Models;

use CodeIgniter\Model;

class Esp32 extends Model
{


    public function getEsp32byUser($id)
    {
     
        $builder = $this->db->table('disp_esp32 e');
        $builder->select('u.nombre_usuario, e.ubicacion, e.ID_dispositivo');
        $builder->join('dispositivos d', 'd.ID_esp32 = e.ID_dispositivo');
        $builder->join('acceso_usuarios au', 'au.ID_dispositivo = d.ID_dispositivo');
        $builder->join('usuarios u', 'u.ID_usuario = au.ID_usuario');
        $builder->where('u.ID_usuario', $id);
        $builder->groupBy('u.ID_usuario, e.ID_dispositivo');
    
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getDevicesbyEsp($esp,$user){

        $table = $this->db->table('dispositivos d');
        $table->select('d.nombre');
        $table->join('disp_esp32 e','e.ID_dispositivo=d.ID_esp32');
        $table->join('acceso_usuarios au','au.ID_dispositivo=d.ID_dispositivo');
        $table->join('usuarios u','u.ID_usuario=au.ID_usuario');
        $table->where(['e.ID_dispositivo'=> $esp,'u.ID_usuario'=> $user]);

        return $table->get()->getResultArray();

    }

    public function insertEsp($ip,$ubicacion,$id){

        $table=$this->db->table("disp_esp32");

        $table->insert([
            "direccion_ip" => $ip,
            "estado" => 1,
            "ubicacion" => $ubicacion,
            'ID_administrador' => $id

        ]);

        return $this->db->insertID();

    }
}
