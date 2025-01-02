<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับและตรวจสอบข้อมูล
    $TenantName = trim($_POST["TenantName"]);
    $ContactNumber = trim($_POST["ContactNumber"]);
    $LeaseStart = $_POST["LeaseStart"];
    $LeaseEnd = $_POST["LeaseEnd"];

    // ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
    $stmt = $conn->prepare("INSERT INTO Tenants (TenantName, ContactNumber, LeaseStart, LeaseEnd) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $TenantName, $ContactNumber, $LeaseStart, $LeaseEnd);

    // ตรวจสอบการเพิ่มข้อมูล
    if ($stmt->execute()) {
        echo "<script>alert('Tenant added successfully');</script>";
        echo "<script>window.location.href='add_tenant.html';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    // ปิด Prepared Statement และการเชื่อมต่อ
    $stmt->close();
    $conn->close();
}
?>
