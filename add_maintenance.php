<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $AssetID = $_POST["AssetID"];
    $Issue = $_POST["Issue"];
    $DateReported = $_POST["DateReported"];
    $Cost = $_POST["Cost"];

    // เพิ่มข้อมูลการบำรุงรักษาลงในฐานข้อมูล
    $sql = "INSERT INTO Maintenance (AssetID, Issue, DateReported, Cost) VALUES ('$AssetID', '$Issue', '$DateReported', '$Cost')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Maintenance record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
