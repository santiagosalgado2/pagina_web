<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login', 'Session::login');
$routes->get("/logout" , "Session::logout");
$routes->post("/register","Session::register");
$routes->get("/generate" , "Verification::generateCode");
$routes->post("/verification" , "Verification::verifyUser");