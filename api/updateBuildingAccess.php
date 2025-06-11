<?php
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        
        $id = (int)$_POST['id'];
        $inputValue = $_POST['inputVal'];

        $query = "UPDATE buildings SET isAccessable = :isAccessable WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':isAccessable', $inputValue);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);   
        $stmt->execute();

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