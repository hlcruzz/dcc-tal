<?php
include "../lib/conn.php";
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    try {
        $building_id = $_GET['id'];

        if (!$building_id) {
            echo json_encode([
                "status" => false,
                "message" => "Building ID doesn't exist"
            ]);
        }
        $query = "SELECT
        facilities.id AS facility_id,
        facilities.facilityName,
        facilities.floorNumber,
        facilities.roomNumber,
        facilities.description,
        DATE_FORMAT(facilities.created_at, '%M %d, %Y %h:%i %p') AS facility_date,
        GROUP_CONCAT(facilities_img.img SEPARATOR ',') AS img,
        GROUP_CONCAT(facilities_img.id SEPARATOR ',') AS img_id,
        facilities.latitude,
        facilities.longitude
        FROM
        facilities
        INNER JOIN
        facilities_img
        ON
        facilities.id = facilities_img.facility_id
        WHERE
        facilities.building_id = :building_id
        AND
        (facilities.status = 1 AND facilities_img.status = 1)
        GROUP BY 
        facilities.id
        ORDER BY
        facilities.id;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":building_id", $building_id);
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