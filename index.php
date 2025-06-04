<?php
$URI = $_SERVER['REQUEST_URI'];
switch ($URI) {
    case '/':
        require "./user/app.php";
        break;
    case '/home':
        require "./user/pages/home.php";
        break;
    default:
        # code...
        break;
}
