<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post("/connect_esp32", "Esp32C::receiveConn");
$routes->post('/login', 'Session::login');
$routes->post("/generate2/(:segment)" , "Verification::generateCode/$1");
$routes->get("/logout" , "Session::logout");
$routes->post("/register","Session::register");
$routes->get("/generate/(:segment)" , "Verification::generateCode/$1");
$routes->post("/verification" , "Verification::verifyUser");
$routes->get("/reset","Verification::resetPwView");
$routes->post("/change","Users::changePw");
$routes->get("/new_user","Users::newUserView");
$routes->get("/create_pw/(:num)","Users::generatePw/$1");
$routes->post("/create_user","Users::createNewUser");
$routes->post("/set_pw","Users::changePw");
$routes->get("/showUsers","Users::showUsers");
$routes->post("/esp32","Esp32C::devicesbyEsp");
$routes->get("userInfo","Users::viewUserinfo");
$routes->get("/prueba","Home::viewPrueba");
$routes->post("/sendIR","Esp32C::sendIR");
$routes->get("/change_user","Users::changeUserview");
$routes->post("/change_user/change","Users::change_user");
$routes->get("/new_esp","Esp32C::newEspview");
$routes->post("/new_esp/insert","Esp32C::insertNewesp");
$routes->post("/new_esp/receive","Esp32C::receiveEsp");
$routes->post('/prueba_control',"Esp32C::control_view");
$routes->post('/prueba_aircontrol',"Esp32C::air_view");
$routes->get('/ver_senales','Esp32C::ver_senales_vista');
$routes->post('/recibir_codigo','Esp32C::receiveIrCode');
$routes->get('/mostrar_senales','Esp32C::ver_senales');
$routes->post('/prueba_ventiladorcontrol',"Esp32C::ventilador_view");
$routes->get('/devices','Esp32C::devices');
$routes->get('/new_device','Devices::newDeviceView');
$routes->post('/new_device/insert','Devices::newDevice');
$routes->post("/edit_device" , "Devices::editDeviceview");
$routes->post("/edit_device/update","Devices::updateDevice");
$routes->get("/delete_device/(:segment)" , "Devices::deleteDevice/$1");
$routes->get("/return_after_vinculation/(:segment)" , "Esp32C::return_after_vinculation/$1");
$routes->post('/permisos','Users::administrarPermisos');
$routes->post('/actualizar_permiso','Users::actualizarPermiso');
$routes->get('/expo',"Home::expo");
$routes->get('/expo/actualizar',"Home::actualizar");
$routes->get('/expo/getEstado',"Home::getEstado");
$routes->post('/grabar_aire',"Esp32C::grabarAireview");
$routes->post('/grabar_tele',"Esp32C::grabarTeleview");
$routes->post('/grabar_ventilador',"Esp32C::grabarVentiladorview");
$routes->post('/insertar_senal',"Devices::insertarSenal");
$routes->post('/enviar_senal',"Esp32C::sendIR");
$routes->post('/verificar_senal', 'Devices::verifySignal');

