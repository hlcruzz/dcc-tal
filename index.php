<?php
include "./Controllers/RouteController.php";

$router = new Router();
$router->addRoute('', './user/app.php');
$router->addRoute('home', './user/pages/home.php');
$router->addRoute('admin-login', './admin/app.php');
$router->addRoute('dashboard', './admin/pages/dashboard.php');
$router->addRoute('buildings', './admin/pages/buildings.php');
$router->addRoute('facilities', './admin/pages/facilities.php');

$router->handleRequest();
