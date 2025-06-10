<?php
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $id = (int)$_POST['edit_facility_id'];
        $facilityName = trim($_POST['edit_facilityName']);
        $roomNumber = isset($_POST['edit_roomNumber']) ? $_POST['edit_roomNumber'] : "";
        $floorNumber = isset($_POST['edit_floorNumber']) ? $_POST['edit_floorNumber'] : "";
        $description = trim($_POST['edit_facility_desc']);
        $latitude = (float)$_POST['edit_latitude_facility'];
        $longitude = (float)$_POST['edit_longitude_facility'];

        $query = "UPDATE facilities
        SET facilityName = :facilityName, 
            roomNumber = :roomNumber, 
            floorNumber = :floorNumber, 
            description = :description, 
            latitude = :latitude, 
            longitude = :longitude
        WHERE id = :id;"; 
        $stmt = $conn->prepare($query);

        $stmt->bindParam(":facilityName", $facilityName, PDO::PARAM_STR);
        $stmt->bindParam(":roomNumber", $roomNumber);
        $stmt->bindParam(":floorNumber", $floorNumber);
        $stmt->bindParam(":description", $description, PDO::PARAM_STR);
        $stmt->bindParam(":latitude", $latitude);
        $stmt->bindParam(":longitude", $longitude);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();


        if($_FILES['edit_facility_img']['name'][0]) {
            $maxSize = (1024 * 1024) * 5;
            $validTypes = ["image/jpg", "image/jpeg", "image/png"];

            foreach ($_FILES['edit_facility_img']['name'] as $key => $file_name) {
                $temp_name = $_FILES['edit_facility_img']['tmp_name'][$key];
                $file_type = $_FILES['edit_facility_img']['type'][$key];
                $file_size = $_FILES['edit_facility_img']['size'][$key];
                $pathToDb = "./assets/img/buildings/" . basename($file_name);
                $pathToFolder = "../assets/img/buildings/" . basename($file_name);

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

                $imgQuery = "INSERT INTO facilities_img (facility_id, img) VALUES (:facility_id, :img);";
                $stmtImg = $conn->prepare($imgQuery);
                $stmtImg->bindParam(":facility_id", $id, PDO::PARAM_INT);
                $stmtImg->bindParam(":img", $pathToDb, PDO::PARAM_STR);
                $stmtImg->execute();
            }
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