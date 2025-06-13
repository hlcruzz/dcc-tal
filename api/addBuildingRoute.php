<?php
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $building_id = $_POST['building_route_id'];
        $start_lat = $_POST['building_route_start_lat'];
        $start_long = $_POST['building_route_start_long'];


        $query = "INSERT INTO buildings_route (building_id, latitude, longitude) VALUES (:building_id, :latitude, :longitude)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':building_id', $building_id, PDO::PARAM_INT);
        $stmt->bindParam(':latitude', $start_lat, PDO::PARAM_STR);
        $stmt->bindParam(':longitude', $start_long, PDO::PARAM_STR);
        $result = $stmt->execute();

        if ($result) {
            foreach ($_POST['building_route_latitude'] as $key => $latitude) {
                $longitude = $_POST['building_route_longitude'][$key];
                $query2 = "INSERT INTO buildings_route (building_id, latitude, longitude) VALUES (:building_id, :latitude, :longitude)";
                $stmt2 = $conn->prepare($query2);
                $stmt2->bindParam(':building_id', $building_id, PDO::PARAM_INT);
                $stmt2->bindParam(':latitude', $latitude, PDO::PARAM_STR);
                $stmt2->bindParam(':longitude', $longitude, PDO::PARAM_STR);
                $stmt2->execute();
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
