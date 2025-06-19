<?php
include "../lib/conn.php";
include "../lib/key.php";
include "../assets/library/php-jwt-main/src/Key.php";
include "../assets/library/php-jwt-main/src/JWT.php";


use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $decoded = JWT::decode($_COOKIE['token'], new Key($key, 'HS256'));
        $building_id = $_POST['buildingId'];
        $building_name = $_POST['buildingName'];
        $visit_purpose = $_POST['visitPurpose'];
        $fname = $decoded->data->fname;
        $lname = $decoded->data->lname;
        $phone_num = $decoded->data->phoneNum;
        $province = $decoded->data->province;
        $city = $decoded->data->city;
        $brgy = $decoded->data->brgy;
        $street = $decoded->data->street;

        $query = "INSERT INTO visitors 
        (building_id, destination, visit_purpose, fname, lname, phone_num, province, city, brgy, street)
        VALUES 
        (:building_id, :destination, :visit_purpose, :fname, :lname, :phone_num, :province, :city, :brgy, :street)
        ;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':building_id', $building_id);
        $stmt->bindParam(':destination', $building_name);
        $stmt->bindParam(':visit_purpose', $visit_purpose);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':phone_num', $phone_num);
        $stmt->bindParam(':province', $province);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':brgy', $brgy);
        $stmt->bindParam(':street', $street);
        $stmt->execute();

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
