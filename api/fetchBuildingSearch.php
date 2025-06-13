<?php
include "../lib/conn.php";

if($_SERVER['REQUEST_METHOD'] === "GET"){
    $value = isset($_GET['value']) ? "%" . $_GET['value'] . "%" : '';

    $query = "SELECT 
    id,
    building_name
    FROM 
    buildings
    WHERE
    building_name LIKE :value
    ;";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":value", $value, PDO::PARAM_STR);
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}