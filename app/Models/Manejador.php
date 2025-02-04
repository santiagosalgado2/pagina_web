<?php

namespace App\Models;


use CodeIgniter\Model;

class Manejador extends Model{

    public function __construct(){
        $this->db = \Config\Database::connect('handle');
    }

    public function insertActionQuery($action,$esp){
        $tabla=$this->db->table('solicitudes');

        $tabla->insert(['ID_accion'=>$action,'codigo_esp32'=>$esp,'estado'=>0]);

        if($this->db->affectedRows()>0){
            return $this->db->insertID();
        }else{
            return false;
        }

    }

    public function updateActionQuery($esp){
        $tabla=$this->db->table('solicitudes');

        $tabla->where('codigo_esp32',$esp);

        $tabla->update(['estado'=>1]);

        if($this->db->affectedRows()>0){
            return true;
        }else{
            return false;
        }
    }

    public function deleteActionQuery($esp){

        $tabla=$this->db->table('solicitudes');

        $tabla->where('codigo_esp32',$esp);

        $tabla->delete();

        if($query=$this->getActionQuery($esp)){

            $tabla2=$this->db->table('datos_solicitud')->where('ID_solicitud',$query[0]['ID_solicitud'])->delete();

        }

        if($this->db->affectedRows()>0){
            return true;
        }else{
            return false;
        }
    }

    public function getActionQuery($esp){
        $tabla=$this->db->table('solicitudes');

        $tabla->where('codigo_esp32',$esp);

        $result=$tabla->get()->getResultArray();

        return $result;
    }

    public function insertDataQuery($key,$value){

        $tabla=$this->db->table('datos_solicitud');

        $tabla->insert(['ID_solicitud'=>$key,'dato'=>$value]);

        return $this->db->insertID();

    }

}