<?php
include "../lib/conn.php";
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    try {
        $id = $_GET['id'];
        $query = "SELECT
        id,
        building_id,
        latitude,
        longitude,
        DATE_FORMAT(created_at, '%M %d, %Y %h:%i %p') AS created_at  
        FROM building_route
        WHERE building_id = :building_id
        ;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':building_id', $id, PDO::PARAM_INT);
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