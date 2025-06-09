<?php
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
       
        $img_id = (int)$_POST['id'];
        $query = "UPDATE buildings_img SET status = 0 WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $img_id, PDO::PARAM_INT);
        $stmt->execute();

        $action = "Delete";
        $tableName = "buildings_img";
        $pageName = "Buildings Images";
        $archiveQuery = "INSERT INTO archive (fk_id, tableName, pageName, action) VALUES (:fk_id, :tableName, :pageName, :action)";
        $stmtArchive = $conn->prepare($archiveQuery);
        $stmtArchive->bindParam(":fk_id", $img_id, PDO::PARAM_INT);
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