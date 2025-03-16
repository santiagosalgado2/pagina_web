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

    public function insertSignal($signal,$device,$function,$protocol,$bits,$config){
        $tabla=$this->db->table('senalesir');
        $data = array(
            "codigo"=>$signal,
            "ID_dispositivo"=>$device,
            "ID_funcion"=>$function,
            "ID_protocolo"=>$protocol,
            "bits"=>$bits,
            "ID_configuracion"=>$config
        );

        $tabla->insert($data);
    }

    public function updateSignal($signal,$device,$function){
        $tabla=$this->db->table('senalesir');
        $data = array(
            "codigo_hexadecimal"=>$signal
        );

        $tabla->where('ID_dispositivo',$device);
        $tabla->where('ID_funcion',$function);

        $tabla->update($data);

    }

    public function verifyAirsignal($device,$config){

        $tabla=$this->db->table('senalesir');

        $tabla->where('ID_dispositivo',$device);

        $tabla->where('ID_configuracion',$config);

        return $tabla->get()->getResultArray();

    }

    public function getSignal($disp,$func){
        $tabla=$this->db->table('senalesir');
        $tabla->where('ID_dispositivo',$disp);
        $tabla->where('ID_funcion',$func);
        return $tabla->get()->getResultArray();
    }

    public function deleteSignalsbyDevice($id){
        $tabla=$this->db->table('senalesir');
        $tabla->where('ID_dispositivo',$id);
        $tabla->delete();
    }

    public function getConfigbyDevice($id){

        $tabla=$this->db->table('configuraciones c');

        $tabla->select('c.temperatura,c.swing,c.modo,c.fanspeed,s.ID_senal');

        $tabla->join('senalesir s','s.ID_configuracion=c.ID_configuracion');

        $tabla->join('dispositivos d','d.ID_dispositivo=s.ID_dispositivo');

        $tabla->where(['d.ID_dispositivo' => $id]);

        return $tabla->get()->getResultArray();

    }

    public function verifyConfig($temp,$modo,$swing,$fan){
        $tabla = $this->db->table('configuraciones');

        $tabla->where('temperatura',$temp);

        $tabla->where('swing',$swing);

        $tabla->where('modo',$modo);

        $tabla->where('fanspeed',$fan);

        return $tabla->get()->getResultArray();


    }

    public function insertConfig($temp,$modo,$swing,$fan){

        $tabla = $this->db->table('configuraciones');

        $data=array(

            'temperatura' =>$temp,
            'swing'=>$swing,
            'modo'=>$modo,
            'fanspeed'=>$fan

        );

        $tabla->insert($data);

        return $this->db->insertID();

    }

    public function deleteConfig($id){
        $tabla=$this->db->table('senalesir');

        $tabla->where('ID_senal',$id);

        $tabla->delete();
    }

}