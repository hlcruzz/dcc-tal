<?php
include "./Controllers/RouteController.php";

$router = new Router();
$router->addRoute('', './user/app.php');
$router->addRoute('home', './user/pages/home.php');
$router->addRoute('admin-login', './admin/app.php');
$router->addRoute('dashboard', './admin/pages/dashboard.php');
$router->addRoute('academic', './admin/pages/academic/academic.php');
$router->addRoute('academic-facilities', './admin/pages/academic/facilities.php');

$router->handleRequest();