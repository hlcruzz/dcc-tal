<?php
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $building_id = (int)$_POST['edit_building_id'];
        $building_name = trim($_POST['edit_building_name']);
        $is_structured = trim($_POST['edit_is_structured'] ?? 0);
        $latitude = (float)$_POST['edit_academics_latitude'];
        $longitude = (float)$_POST['edit_academics_longitude'];

        $query = "UPDATE buildings 
        SET building_name = :building_name, 
            is_structured = :is_structured, 
            latitude = :latitude, 
            longitude = :longitude
        WHERE id = :id;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":building_name", $building_name, PDO::PARAM_STR);
        $stmt->bindParam(":is_structured", $is_structured, PDO::PARAM_INT);
        $stmt->bindParam(":latitude", $latitude);
        $stmt->bindParam(":longitude", $longitude);
        $stmt->bindParam(":id", $building_id, PDO::PARAM_INT);
        $stmt->execute();


        if ($_FILES['edit_building_img']['name'][0]) {
            $maxSize = (1024 * 1024) * 5;
            $validTypes = ["image/jpg", "image/jpeg", "image/png"];

            foreach ($_FILES['edit_building_img']['name'] as $key => $file_name) {
                $temp_name = $_FILES['edit_building_img']['tmp_name'][$key];
                $file_type = $_FILES['edit_building_img']['type'][$key];
                $file_size = $_FILES['edit_building_img']['size'][$key];
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

                $imgQuery = "INSERT INTO buildings_img (buildings_id, img) VALUES (:buildings_id, :img);";
                $stmtImg = $conn->prepare($imgQuery);
                $stmtImg->bindParam(":buildings_id", $building_id, PDO::PARAM_INT);
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
