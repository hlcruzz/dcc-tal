<?php
include "../lib/conn.php";
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    try {
        $building_type = $_GET['type'];
        $query = "SELECT 
        building_name,
        latitude,
        longitude
        FROM
        buildings
        WHERE
        status = 1
        AND
        (isAccessable = 1 AND building_type = :building_type)
        ;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":building_type", $building_type);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode([
            "status" => true,
            "data" => $result
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => false,
            "message" => $e->getMessage()
        ]);
    }
}