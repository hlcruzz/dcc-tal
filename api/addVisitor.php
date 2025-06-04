<?php
include "../lib/conn.php";
include "../lib/key.php";
require_once "../assets/library/php-jwt-main/src/JWT.php";

use Firebase\JWT\JWT;


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        // JWT payload
        $payload = [
            "iss" => "", //domain
            "aud" => "", //domain
            "iat" => time(),
            "exp" => time() + (3000 * 60), // 30 minutes expiration
            "data" => [
                "fname" => $_POST['fname'],
                "lname" => $_POST['lname'],
                "phoneNum" => $_POST['phoneNum'],
                "visitorType" => $_POST['visitorType'],
                "province" => $_POST['province'],
                "city" => $_POST['city'],
                "brgy" => $_POST['brgy'],
                "street" => $_POST['street'],
                "role" => "user"
            ]
        ];

        // Encode the token
        $jwt = JWT::encode($payload, $key, 'HS256');

        // Set JWT as HTTP-only cookie
        setcookie(
            "token",       // cookie name
            $jwt,                 // JWT token
            time() + (3000 * 60),   // 30 minutes expiration
            "/",                  // path
            "",                   // domain (current)
            false,                // secure (true if using HTTPS)
            true                  // httponly
        );
        echo json_encode([
            "status" => true,
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => false,
            "message" => $e->getMessage()
        ]);
    }
}
