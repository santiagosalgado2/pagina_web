<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login', 'Session::login');
$routes->post("/generate2/(:segment)" , "Verification::generateCode/$1");
$routes->get("/logout" , "Session::logout");
$routes->post("/register","Session::register");
$routes->get("/generate/(:segment)" , "Verification::generateCode/$1");
$routes->post("/verification" , "Verification::verifyUser");
$routes->get("/reset","Verification::resetPwView");
$routes->post("/change","Users::changePw");