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
$routes->get("/sendIR","Esp32C::sendIR");
$routes->get("/change_user","Users::changeUserview");
$routes->post("/change_user/change","Users::change_user");
$routes->get("change_email","Users::changeEmailview");
$routes->get("/new_esp","Esp32C::newEspview");