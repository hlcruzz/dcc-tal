<?php
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    try {
        $value = isset($_GET['value']) ? "%" . $_GET['value'] . "%" : '';

        $query = "SELECT 
        buildings.id as building_id,
        buildings.building_name as building_name,
        buildings.building_desc as building_desc,
        buildings.is_structured,
        buildings.isAccessable,
        GROUP_CONCAT(buildings_img.img SEPARATOR ',') AS img
        FROM buildings
        LEFT JOIN buildings_img ON buildings.id = buildings_img.buildings_id
        WHERE
        buildings.building_name LIKE :value
        AND
        (buildings.is_structured = 1 AND buildings.status = 1 AND buildings_img.status = 1)
        
        GROUP BY buildings.id
        ORDER BY buildings.building_name ASC
        ;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":value", $value, PDO::PARAM_STR);
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
