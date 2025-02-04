<?php

namespace Config;

use CodeIgniter\Config\BaseService;

use \App\Models\Verificacion;

use \App\Models\Manejador;


/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{

    public $manejador;

    public function __construct(){

        $this->modelo= new Manejador;

    }
    /*
     * public static function example($getShared = true)
     * {
     *     if ($getShared) {
     *         return static::getSharedInstance('example');
     *     }
     *
     *     return new \CodeIgniter\Example();
     * }
     */


     public static function sendEmail($email,$asunto,$cuerpo){

        $obj=\Config\Services::email();

        $obj->setTo($email);

        $obj->setSubject($asunto);

        $obj->setMessage($cuerpo);

        if($obj->send()){

            return true;
        }
        
        else{

            return false;
        }


    }


    public static function generateCode(){

        $usersmodel = new Verificacion();

        while(true){

            $hex = bin2hex(random_bytes(3)); // Genera 6 caracteres hexadecimales. Convierte 3 bytes a hexadecimal y cada byte se transforma en 2 caracteres hexadecimales.
            $number = base_convert($hex, 16, 10); // Convierte el número hexadecimal a decimal.
            $codigo = substr($number, 0, 6); // Toma los primeros 6 caracteres del número decimal.

            if(empty($usersmodel->getCode(["codigo" => $codigo]))){

                return $codigo;

            }


        }

    }

    

    
}
