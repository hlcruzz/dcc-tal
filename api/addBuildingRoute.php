<?php
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $building_id = $_POST['building_route_id'];
        $latitude = $_POST['building_route_lat'];
        $longitude = $_POST['building_route_lng'];

        $query = "INSERT INTO building_route (building_id, latitude, longitude) VALUES (:building_id, :latitude, :longitude)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':building_id', $building_id, PDO::PARAM_INT);
        $stmt->bindParam(':latitude', $latitude);
        $stmt->bindParam(':longitude', $longitude);
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