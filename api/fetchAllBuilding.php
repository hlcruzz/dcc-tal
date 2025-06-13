<?php
include "../lib/conn.php";
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    try {
        $query = "SELECT
        buildings.id AS building_id,
        buildings.building_name,
        buildings.is_structured,
        DATE_FORMAT(buildings.created_at, '%M %d, %Y %h:%i %p') AS created_at,  
        buildings.isAccessable,
        buildings.latitude,
        buildings.longitude,
        buildings.status,
        GROUP_CONCAT(buildings_img.img SEPARATOR ',') AS img,
        GROUP_CONCAT(buildings_img.id SEPARATOR ',') AS img_id
        FROM
        buildings
        INNER JOIN
        buildings_img
        ON
        buildings.id = buildings_img.buildings_id
        WHERE
        (buildings.status = 1 AND buildings_img.status = 1)
        GROUP BY 
        buildings.id
        ORDER BY 
        buildings.id
        ;";

        $stmt = $conn->prepare($query);
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
