<?php
$URI = $_SERVER['REQUEST_URI'];
switch ($URI) {
    case '/':
        require "./user/app.php";
        break;
    case '/home':
        require "./user/pages/home.php";
        break;
    case '/admin-login':
        require "./admin/app.php";
        break;
    case '/dashboard':
        require "./admin/pages/dashboard.php";
        break;
    default:
        echo "not found";
        break;
}
