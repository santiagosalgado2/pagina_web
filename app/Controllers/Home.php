<?php

/*
GRAN PARTE DEL CÓDIGO ESTÁ ESCRITO POR NOSOTROS, LOGICAMENTE HEMOS SACADO PARTES DE PÁGINAS O DE IA AL ESTAR INVESTIGANDO FUNCIONES TANTO DE CODEIGNITER 
COMO DE PHP (COMO HASHEAR Y VERIFICAR CONTRASEÑAS, UTILIZAR SERVICIOS, ENVIAR EMAILS AUTOMATICOS, UTILIZAR QUERY BUILDER PARA LOS MODELOS, ETC.), 
QUE NO SABÍAMOS COMO UTILIZAR PERO QUE NECESITABAMOS PARA PROGRAMAR DISTINTAS FUNCIONES. TODOS LOS COMENTARIOS TAMBIÉN SERÁN REALIZADOS POR NOSOTROS CON NUESTRAS
PALABRAS PARA FACILITAR LA EXPLICACIÓN DEL CODIGO LUEGO Y GARANTIZAR QUE LOS 2 ENTENDEMOS COMO FUNCIONA LA PROGRAMACIÓN DEL SITIO WEB.
*/

namespace App\Controllers;

use App\Models\Usuarios;
use App\Models\Esp32;


class Home extends BaseController
{

    //ATRIBUTOS NECESARIOS PARA EL MODULO DE PAYPAL
    private $clientId="AU7kXT2lcfGitavBqTNmysdQ9Z3tS04lx8PYLnqs41sTEV5LKJvxgUv2kawJJt-aSxlHJdT3vYAmslFv";

    private $clientSecret ="EJCqeNo4AUc6FDJNk7pV7w5KgYZJy1dwUwlCnKxg3Mt2IXfO-FIuLVFlEWrdykgePW5Amn-FtMhpBPzN";

    public function index(): string
    {
         $session = session();

         if($session->get("verificado")){ #VERIFICA SI EL USUARIO ESTA VERIFICADO Y HA INICIADO SESIÓN
             $obj=new Esp32(); #INSTANCIA EL MODELO DE ESP32 PARA BUSCAR LOS DISPOSITIVOS A LOS QUE TIENE ACCESO EL USUARIO
             if($session->get('tipo')==2){
                 $datos=$obj->getEsp32byUser($session->get("user_id"));
             }else{
                 $datos=$obj->getEsp32byAdmin($session->get("user_id"));
             }

             if(isset($_GET['success'])){ 
                 return view("inicio", ["datos" => $datos, "success"=>"ESP32 vinculado correctamente"]);
             } #ENVIA LOS DATOS A LA VISTA 'INICIO' CON LOS ESP A LOS QUE TIENE ACCESO EL USUARIO
             else{
                 return view("inicio", ["datos" => $datos]);
             }
         }else{
             return view('landing_page/index'); #EN CASO DE QUE EL USUARIO NO HAYA INICIADO SESION, LO ENVIA AL LOGIN
         }

    }

    public function inicio(){
        return view("inicio");
    }

    public function viewPrueba(){
        return view("prueba");
    }

    public function viewlogin(){

        if(session()->get('verificado')){
            return redirect()->to(base_url());
        }else{
            return view('login');
        }

    }

    public function pruebalogin(){
        return view('login1');
    }




    //EXPO 2024



    public function expo(){
        return view('landing_page');
    }
    public function actualizar(){
        $estado = $this->request->getGet('estado');
        if ($estado) {
            // Verifica el valor del estado y actualiza el archivo
            $estadoAnterior = file_get_contents(WRITEPATH . 'semaforo_estado.txt');
            
            // Guarda el nuevo estado solo si es diferente
            if ($estado !== $estadoAnterior) {
                file_put_contents(WRITEPATH . 'semaforo_estado.txt', $estado);
            }
            
            return $this->response->setStatusCode(200);
        }
    }

    public function getEstado(){
        $estado = file_get_contents(WRITEPATH . 'semaforo_estado.txt');
        return $this->response->setJSON(['estado' => $estado]);
    }


    //MODULO DE PAYPAL

    private function getAccessToken()
    {
        $url = "https://api-m.sandbox.paypal.com/v1/oauth2/token";
        $credentials = base64_encode("$this->clientId:$this->clientSecret");

        $options = [
            "http" => [
                "header" => "Authorization: Basic $credentials\r\n" .
                            "Content-Type: application/x-www-form-urlencoded\r\n",
                "method" => "POST",
                "content" => "grant_type=client_credentials"
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return json_decode($result, true)["access_token"] ?? null;
    }

    // Crear una orden en PayPal
    public function createOrder()
    {
        $input = $this->request->getJSON();
        $amount = $input->amount ?? "10.00"; // Monto por defecto si no se envía

        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            return $this->response->setJSON(["error" => "No se pudo obtener el token"])->setStatusCode(500);
        }

        $url = "https://api-m.sandbox.paypal.com/v2/checkout/orders";
        $body = json_encode([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $amount
                    ]
                ]
            ]
        ]);

        $options = [
            "http" => [
                "header" => "Authorization: Bearer $accessToken\r\n" .
                            "Content-Type: application/json\r\n",
                "method" => "POST",
                "content" => $body
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return $this->response->setJSON(json_decode($result, true));
    }

    // Capturar el pago
    public function captureOrder()
    {
        $input = $this->request->getJSON();
        $orderID = $input->orderID ?? null;

        if (!$orderID) {
            return $this->response->setJSON(["error" => "No se recibió un Order ID"])->setStatusCode(400);
        }

        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            return $this->response->setJSON(["error" => "No se pudo obtener el token"])->setStatusCode(500);
        }

        $url = "https://api-m.sandbox.paypal.com/v2/checkout/orders/$orderID/capture";
        $options = [
            "http" => [
                "header" => "Authorization: Bearer $accessToken\r\n" .
                            "Content-Type: application/json\r\n",
                "method" => "POST"
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultData = json_decode($result, true);
        $email = $resultData['payer']['email_address'];

        \Config\Services::sendEmail($email,'¡Gracias por comprar IRConnect!',"<h1>Su compra ha sido cargada en nuestro sistema
        <br><br>Cuando reciba el producto, ya podrá disfrutar de todas las funciones de IRConnect</h1>");

        return $this->response->setJSON(json_decode($result, true));
    }

    public function formcontact(){
        $nombre=$this->request->getPost('name');

        $email=$this->request->getPost('email');

        $asunto=$this->request->getPost('subject');

        $mensaje=$this->request->getPost('message');

        \Config\Services::sendEmail('irconnect33@gmail.com','Consulta nueva de '.$email,'
        Nombre: '.$nombre.'
        <br>Email: '.$email.'
        <br>Asunto: '.$asunto.'
        <br>Mensaje: '.$mensaje);

        \Config\Services::sendEmail($email,'Consulta enviada correctamente','<h1>Hola '.$nombre.'! Tu consulta fue enviada correctamente. En instantes, un miembro de nuestro soporte le enviará un correo electrónico respondiendo su mensaje</h1>');

        return $this->response->setStatusCode(200)->setBody('OK');



    }

    
}
