<?php
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
       
        $id = (int)$_POST['id'];
        $type = $_POST['type'];
        $query = "UPDATE buildings SET status = 0 WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $action = "Delete";
        $tableName = "buildings";
        $pageName = "$type Buildings";
        $archiveQuery = "INSERT INTO archive (fk_id, tableName, pageName, action) VALUES (:fk_id, :tableName, :pageName, :action)";
        $stmtArchive = $conn->prepare($archiveQuery);
        $stmtArchive->bindParam(":fk_id", $id, PDO::PARAM_INT);
        $stmtArchive->bindParam(":tableName", $tableName, PDO::PARAM_STR);
        $stmtArchive->bindParam(":pageName", $pageName, PDO::PARAM_STR);
        
        $stmtArchive->bindParam(":action", $action, PDO::PARAM_STR);
        $stmtArchive->execute();


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