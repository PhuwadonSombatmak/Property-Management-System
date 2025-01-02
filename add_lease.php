<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $AssetID = $_POST["AssetID"];
    $TenantID = $_POST["TenantID"];
    $LeaseStart = $_POST["LeaseStart"];
    $LeaseEnd = $_POST["LeaseEnd"];
    $MonthlyRent = $_POST["MonthlyRent"];

    // เพิ่มข้อมูลสัญญาเช่าลงในฐานข้อมูล
    $sql = "INSERT INTO Leases (AssetID, TenantID, LeaseStart, LeaseEnd, MonthlyRent) VALUES ('$AssetID', '$TenantID', '$LeaseStart', '$LeaseEnd', '$MonthlyRent')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Lease added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
