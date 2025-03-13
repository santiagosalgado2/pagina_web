<?php 

namespace App\Controllers;

use App\Models\Esp32;
use App\Models\Dispositivos;
use App\Models\Manejador;

class Esp32C extends BaseController{

    public function devicesbyEsp(){
        #FUNCION QUE OBTIENE LOS DISPOSTIVOS VINCULADOS A UN ESP32 SELECCIONADO POR EL USUARIO
        #LOS DATOS SE GUARDAN EN LA SESION DEL USUARIO PARA PODER SER UTILIZADOS EN OTRAS FUNCIONES
        #SE REDIRIGE A LA RUTA DEVICES QUE EJECUTARA EL CONTROLADOR QUE HARA LA CONSULTA A LA BD A TRAVES DEL MODELO
        #ESTO SE HACE ASI PORQUE SINO CUANDO EL USUARIO VUELVE A LA PAGINA PRINCIPAL, EL NAVEGADOR PIERDE LOS DATOS DEL FORMULARIO
        $session = session();

        $espmodel = new Esp32;

        $verify=$espmodel->getEsp32byCode($this->request->getPost('esp_code'));

        if($verify[0]['estado']==0){
            return redirect()->back()->with('error','El dispositivo seleccionado no se encuentra disponible. Verifique su conexión y vuelva a intentarlo');
        }

        $esp_id = $this->request->getPost("esp_id");

        $esp_ip= $this->request->getPost('esp_ip');

        $esp_code = $this->request->getPost('esp_code');

        $session->set('esp_id',$esp_id);

        $session->set('esp_ip',$esp_ip);

        $session->set('esp_code',$esp_code);

        return redirect()->to('/devices'); 

    }

    public function devices(){
        $espmodel = new Esp32;
        $session = session();
        $esp_id = $session->get('esp_id'); 
    
        
        $datos = $espmodel->getDevicesbyEsp($esp_id,$session->get('user_id'));

        $esp=$espmodel->getEsp32($esp_id);
        
        if(session()->getFlashdata('error')){
            $error=session()->getFlashdata('error');
            return view("devices", ["datos" => $datos, "esp" => $esp, "error"=>$error]);

        }

        #TRAE LOS DATOS DE LOS DISPOSITIVOS Y DE LA ESP SELECCIONADA POR EL USUARIO Y LO ENVIA A LA VISTA DEVICES
        return view("devices", ["datos" => $datos, "esp" => $esp]);

    }


    public function newEspview(){
        #VISTA PARA VINCULAR UN NUEVO ESP32
        return view('new_esp');
    }

    public function insertNewesp(){
        #CUNADO EL USUARIO COMPLETA EL FORMULARIO DE VINCULACION DE UN NUEVO ESP32, SE OBTIENE EL CODIGO Y LA UBICACION DEL FORMULARIO, Y EL ID Y MAIL DE USUARIO ALMACENADOS
        #EN LA SESION
        $code = $this->request->getPost('code');
        $id = session()->get('user_id');
        $mail=session()->get('user_email');
        $location = $this->request->getPost('location');
        $model=new Esp32;

        if($model->getEsp32byCode($code)){
            #SI EL CODIGO YA EXISTE EN LA BD, SE RETORNA UN MENSAJE DE ERROR
            session()->setFlashdata('error', 'El código ya está registrado. Intentelo nuevamente');

            return redirect()->to('/new_esp');
        }
        #SE CREA UN ARCHIVO CSV QUE VA A TENER COMO NOMBRE EL CODIGO DEL ESP32 Y COMO CONTENIDO LOS DATOS OBTENIDOS DEL FORMULARIO Y DE LA SESION
        $fileName = "{$code}.csv";
        $filePath = WRITEPATH . 'data/' . $fileName;
    
        $data = [$code, $id, $mail, $location];
    
        $file = fopen($filePath, 'a');
        if ($file) {
            fputcsv($file, $data);
            fclose($file);
            #SE ABRE EL ARCHIVO CSV (EN CASO DE QUE NO EXISTA, SE CREA AUTOMATICAMENTE) Y SE ESCRIBEN LOS DATOS OBTENIDOS
        } 

        #SE RETORNA AL USUARIO A UNA VISTA QUE LE DETALLA COMO TIENE QUE HACER PARA CONECTAR LA PLACA A WIFI

        return view('esp_instructions.php',['code'=>$code]);
    }

    
    #FUNCIONES DE PRUEBA

    public function sendIR() {
        #FUNCION POR LA CUAL SE ENVIAN LAS SEÑALES IR A LA ESP32 DESDE LA PAGINA WEB
        #USANDO JS SE ENVIAN MEDIANTE POST LA IP DEL ESP32 Y LA SEÑAL EN CRUDO
        #EL TRIM SE USA PARA ELIMINAR ESPACIOS EN BLANCO Y QUE LA URL NO TENGA PROBLEMAS
        $action_id = $this->request->getPost('action_id');
        $deviceId = $this->request->getPost('deviceId');
        $functionId = $this->request->getPost('functionId');
        $num = $this->request->getPost('num');
       
 
            $devicemodel=new Dispositivos;

            $handlemodel=new Manejador;

            $signal=$devicemodel->getSignal($deviceId,$functionId);

            if($num==1 && $signal){
                $insert=$handlemodel->insertDataQuery($functionId,$signal[0]['codigo_hexadecimal'],$action_id);

                return $this->response->setStatusCode(200)->setBody('Señal enviada a la bd');
            }elseif($num==2){
                $handlemodel->deleteActionData($action_id);
                $insert=$handlemodel->insertDataQuery($functionId,null,$action_id);

                return $this->response->setStatusCode(200)->setBody('Señal enviada a la bd');
            }else{
                return $this->response->setStatusCode(500)->setBody('Error al enviar la señal');
            }



    }


    
    public function return_after_vinculation($code){

        $espmodel=new Esp32;

        $esp=$espmodel->getEsp32byCode($code);

        if($esp){
            return $this->response->setJSON(true);
        } else {
        
            return $this->response->setJSON(false);
        }

    }
    

    public function control_view(){

        $handlemodel=new Manejador;
        if($handlemodel->getActionQuery(session()->get('esp_code'))){
            return redirect()->back()->with('error','No es posible realizar una acción ya que la ESP seleccionada se encuentra en uso. Aguarde unos segundos y vuelva a intentarlo');
        }
        $action_id=$handlemodel->insertActionQuery(1,session()->get('esp_code'));

        session()->set('action_id',$action_id);

        return view('tele2',['id'=>$this->request->getPost('id')]);
    }
    public function air_view(){

        $handlemodel=new Manejador;
        
        $action_id=$handlemodel->insertActionQuery(1,session()->get('esp_code'));

        session()->set('action_id',$action_id);
        return view('aire',['id'=>$this->request->getPost('id')]);
    }

    public function ventilador_view(){

        $handlemodel=new Manejador;
        if($handlemodel->getActionQuery(session()->get('esp_code'))){
            return redirect()->back()->with('error','No es posible realizar una acción ya que la ESP seleccionada se encuentra en uso. Aguarde unos segundos y vuelva a intentarlo');
        }
        $action_id=$handlemodel->insertActionQuery(1,session()->get('esp_code'));

        session()->set('action_id',$action_id);

        return view('ventilador',['id'=>$this->request->getPost('id')]);
        
    }


    
    #LAS SIGUIENTES 2 FUNCIONES SON DE PRUEBA Y LAS UTILIZAMOS PARA QUE CUANDO LA ESP RECIBA UNA SEÑAL INFRARROJA, ENVIE SU CODIGO A LA PAGINA Y EL USUARIO LO VEA EN PANTALLA
    public function receiveIrCode()
    {
        #EL ESP ENVIA EL CODIGO HEXADECIMAL DE LA SEÑAL (ACTUALMENTE NO ESTAMOS TRABAJANDO CON SEÑALES EN FORMA HEXADECIMAL SINO EN FORMATO RAW (CRUDO) PERO SOLO ERA UNA PRUEBA)
        #LA ESP TAMBIEN ENVIA SU CODIGO IDENTIFICADOR, EL MISMO QUE SE USA PARA LA VINCULACION

        $irCode1 = str_replace(" ",",",$this->request->getPost('irCode'));

        $irCode2 = preg_replace('/^\d+\s/', '', $irCode1);

        $irCode3 = substr($irCode2, 1);

        $irCode = str_replace(["\r", "\n"], '', subject: $irCode3);

        $code= $this->request->getPost('code');

        $filePath = WRITEPATH . 'data/'.$code.'.csv';

        #LA LETRA A SIGNIFICA APPEND, Y EL ARCHIVO SE ABRIRA PARA ESCRIBIR AL FINAL DEL ARCHIVO. SI EL ARCHIVO NO EXISTE, PHP LO CREA
        $file = fopen($filePath, 'a');
        if ($file) {
            file_put_contents($filePath, '');
            #SE CREA EL ARCHIVO CSV Y SE INSERTA EL ARCHIVO
            fputcsv($file, [$irCode]);
            fclose($file);
            return $this->response->setStatusCode(200)->setBody('Código IR recibido y guardado.');
        } else {
            return $this->response->setStatusCode(500)->setBody('Error al guardar el código IR.');
        }
    }

    public function ver_senales(){
        #ESTA FUNCION BUSCA EL ARCHIVO CSV QUE CONTIENE LAS SEÑALES IR RECIBIDAS POR LA ESP32
        #EL ARCHIVO LO BUSCA POR EL CODIGO IDENTIFICADOR DE LA ESP QUE ESTA ALMACENADO EN LA SESION DEL USUARIO
        $espmodel=new Esp32;

        $esp=$espmodel->getEsp32(session()->get('esp_id'));

        $filePath = WRITEPATH . 'data/'.$esp[0]['codigo'].'.csv';

        if (file_exists($filePath)) {
            if (($handle = fopen($filePath, 'r')) !== false) {
                #DENTRO DEL IF SE DECLARA A HANDLE COMO UN MANEJADOR DEL CSV, SI LA APERTURA FUE EXITOSA SE 
                #DECLARA UN ARRAY VACIO PARA LUEGO ITERAR LOS DATOS DEL CSV Y GUARDARLOS EN EL ARRAY
                $data = [];
                while (($row = fgetcsv($handle)) !== false) {
                    #LA CONDICION VALIDA QUE HAYA DATOS PARA LEER
                    #ITERA LAS SEÑALES Y LAS GUARDA EN UN ARRAY
                    $data[] = $row[0]; #EN ESTE CASO SE PONE 0 PORQUE SOLO HAY UNA COLUMNA
                }
                fclose($handle);
                
             register_shutdown_function(function() use ($filePath) {
                    #ESTA FUNCION SE EJECUTA CUANDO EL CONTROLADOR DEJA DE SER EJECUTADO
                 #CUANDO EL USUARIO SALGA DE LA PAGINA, SE ELIMINA EL ARCHIVO CSV
                 if (file_exists($filePath)) {
                    file_put_contents($filePath, '');
                 }
             });

                #DESCOMENTANDO ESTO, UNA VEZ QUE SE RECIBE UNA SEÑAL SE BORRA EL CSV POR LO QUE SOLO ES POSIBLE VER UNA SEÑAL A LA VEZ
                
                #RETORNA LAS SEÑALES EN FORMATO JSON PARA SER PROCESADAS POR UNA FUNCION DE JS
                return $this->response->setStatusCode(200)->setJSON($data);
                                
                
            }else {
                return $this->response->setStatusCode(500)->setBody('No se pudo abrir el archivo.');
            }
        } else {
            return $this->response->setStatusCode(404)->setBody('El archivo no existe.');
        }
    }
    
    public function ver_senales_vista(){
        return view('senales');
    }

    public function grabarAireview(){
        $handlemodel=new Manejador;
        $action_id=$handlemodel->insertActionQuery(2,session()->get('esp_code'));

        session()->set('action_id',$action_id);
        return view('grabar_aire',['id'=>$this->request->getPost('id')]);
    }

    public function grabarTeleview(){
        $handlemodel=new Manejador;
        if($handlemodel->getActionQuery(session()->get('esp_code'))){
            return redirect()->back()->with('error','No es posible realizar una acción ya que la ESP seleccionada se encuentra en uso. Aguarde unos segundos y vuelva a intentarlo');
        }
        $action_id=$handlemodel->insertActionQuery(2,session()->get('esp_code'));

        session()->set('action_id',$action_id);
        return view('grabar_tele',['id'=>$this->request->getPost('id')]);
    }

    public function grabarVentiladorview(){
        $handlemodel=new Manejador;
        if($handlemodel->getActionQuery(session()->get('esp_code'))){
            return redirect()->back()->with('error','No es posible realizar una acción ya que la ESP seleccionada se encuentra en uso. Aguarde unos segundos y vuelva a intentarlo');
        }
        $action_id=$handlemodel->insertActionQuery(2,session()->get('esp_code'));

        session()->set('action_id',$action_id);
        return view('grabar_ventilador',['id'=>$this->request->getPost('id')]);
    }

    public function verifySignal(){
        $handlemodel=new Manejador;

        $action_id = $this->request->getPost('action_id');

        if($data=$handlemodel->getActionData($action_id)){
            return $this->response->setStatusCode(500);
        }else{
            return $this->response->setStatusCode(code: 200);
        }
    }

    public function deleteAction(){
        $json = $this->request->getJSON();
        if ($json && isset($json->action_id)) {
            $handlemodel = new Manejador;
            $id = $json->action_id;
            $handlemodel->deleteActionData($id);
            $handlemodel->deleteActionQuery(session()->get('esp_code'));
    
            session()->remove('action_id');
        }

    }

    public function verifyRecording(){

        $action_id= $this->request->getJSON()->action_id;

        $functionId = $this->request->getJSON()->functionId;

        $handlemodel=new Manejador;

        $data=$handlemodel->getActionData($action_id);

        if($data && $data[0]['clave'] == $functionId){
            $senal=$data[0]['valor'];
            return $this->response->setStatusCode(200)->setJSON(['irCode'=>$senal]);
        }else{
            return $this->response->setStatusCode(500);
        }
    }

}