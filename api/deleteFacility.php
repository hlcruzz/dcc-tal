<?php
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
       
        $id = (int)$_POST['id'];
        $name = $_POST['name'];
        $query = "UPDATE facilities SET status = 0 WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $action = "Delete";
        $tableName = "buildings";
        $pageName = "$name Facility";
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