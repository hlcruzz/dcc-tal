<?php
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $building_id = $_POST['building_id'];
        $facilityName = trim($_POST['facilityName']);
        $roomNumber = $_POST['roomNumber'] ?? null;
        $floorNumber = $_POST['floorNumber'] ?? null;
        $description = trim($_POST['facility_desc']);
        $latitude = (float)$_POST['latitude_facility'];
        $longitude = (float)$_POST['longitude_facility'];

        $query = "INSERT INTO facilities (building_id, facilityName, floorNumber, roomNumber, description, latitude, longitude) VALUES (:building_id, :facilityName, :floorNumber, :roomNumber, :description, :latitude, :longitude)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":building_id", $building_id, PDO::PARAM_INT);
        $stmt->bindParam(":facilityName", $facilityName, PDO::PARAM_STR);
        $stmt->bindParam(":floorNumber", $floorNumber);
        $stmt->bindParam(":roomNumber", $roomNumber);
        $stmt->bindParam(":description", $description, PDO::PARAM_STR);
        $stmt->bindParam(":latitude", $latitude);
        $stmt->bindParam(":longitude", $longitude);

        $stmt->execute();

        $facility_id = $conn->lastInsertId();

        $maxSize = (1024 * 1024) * 5;
        $validTypes = ["image/jpg", "image/jpeg", "image/png"];

        foreach ($_FILES['facility_img']['name'] as $key => $file_name) {
            $temp_name = $_FILES['facility_img']['tmp_name'][$key];
            $file_type = $_FILES['facility_img']['type'][$key];
            $file_size = $_FILES['facility_img']['size'][$key];
            $pathToDb = "./assets/img/facilities/" . basename($file_name);
            $pathToFolder = "../assets/img/facilities/" . basename($file_name);

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
                    "message" => "Image Uploade Failed."
                ]));
            }

            $imgQuery = "INSERT INTO facilities_img (facility_id, img) VALUES (:facility_id, :img);";
            $stmtImg = $conn->prepare($imgQuery);
            $stmtImg->bindParam(":facility_id", $facility_id, PDO::PARAM_INT);
            $stmtImg->bindParam(":img", $pathToDb, PDO::PARAM_STR);
            $stmtImg->execute();
        }

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