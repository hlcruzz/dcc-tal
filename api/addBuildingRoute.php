<?php
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $building_id = $_POST['building_route_id'];
        $latitude = $_POST['building_route_lat'];
        $longitude = $_POST['building_route_lng'];

        $file_name = $_FILES['building_route_img']['name'];
        $temp_name = $_FILES['building_route_img']['tmp_name'];
        $file_type = $_FILES['building_route_img']['type'];
        $file_size = $_FILES['building_route_img']['size'];
        $pathToDb = "./assets/img/building-routes/" . basename($file_name);
        $pathToFolder = "../assets/img/building-routes/" . basename($file_name);

        $maxSize = (1024 * 1024) * 5;
        $validTypes = ["image/jpg", "image/jpeg", "image/png"];
        if ($file_size > $maxSize) {
            die(json_encode([
                "status" => false,
                "message" => "File is too large."
            ]));
        }
        if (!in_array($file_type, $validTypes)) {
            die(json_encode([
                "status" => false,
                "message" => "Invalid file type."
            ]));
        }

        if (!move_uploaded_file($temp_name, $pathToFolder)) {
            die(json_encode([
                "status" => false,
                "message" => "Image Upload Failed."
            ]));
        }


        $query = "INSERT INTO building_route (building_id, latitude, longitude, img) VALUES (:building_id, :latitude, :longitude, :img)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':building_id', $building_id, PDO::PARAM_INT);
        $stmt->bindParam(':latitude', $latitude);
        $stmt->bindParam(':longitude', $longitude);
        $stmt->bindParam(':img', $pathToDb);
        $result = $stmt->execute();

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
