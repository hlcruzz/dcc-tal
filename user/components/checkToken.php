<?php
include "./assets/library/php-jwt-main/src/JWT.php";
include "./assets/library/php-jwt-main/src/Key.php";
include "./lib/key.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if (isset($_COOKIE['token'])) {
    try {
        $decoded = JWT::decode($_COOKIE['token'], new Key($key, 'HS256'));
    } catch (Exception $e) {
        echo "
            <script>
            alert('Invalid Token: $e');
            window.location.href = '/';
            </script>
            ";
    }
} else {
    echo "
    <script>
    alert('Session Expired');
    window.location.href = '/';
    </script>";
}