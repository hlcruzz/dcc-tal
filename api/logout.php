<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    setcookie(
        "token",
        "",
        [
            'expires' => time() - 3600,
            'path' => '/',
            'domain' => '',
            'secure' => false,
            'httponly' => true,
        ]
    );
}
