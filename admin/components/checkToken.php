<?php
include "./assets/library/php-jwt-main/src/JWT.php";
include "./assets/library/php-jwt-main/src/Key.php";
include "./lib/key.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if (isset($_COOKIE['auth'])) {
    try {
        $decoded = JWT::decode($_COOKIE['auth'], new Key($key, 'HS256'));
    } catch (Exception $e) {
        echo "
            <script>
            alert('Invalid Token: " . $e->getMessage() . "');
            window.location.href = '/admin-login';
            </script>
            ";
    }
} else {
    echo "
    <script>
    alert('Session Expired');
    window.location.href = '/admin-login';
    </script>";
}
