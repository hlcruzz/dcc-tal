<?php
$URI = $_SERVER['REQUEST_URI'];
switch ($URI) {
    case '/':
        require "./user/pages/login.php";
        break;

    default:
        # code...
        break;
}