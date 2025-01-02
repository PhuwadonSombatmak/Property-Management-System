<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "propertymanagement";

// สร้างการเชื่อมต่อกับฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // ใช้การแสดงข้อความที่เป็นมิตรกับผู้ใช้มากขึ้นหากการเชื่อมต่อล้มเหลว
}

// ตรวจสอบว่ามีการส่งคำขอแบบ POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์มและป้องกัน SQL Injection
    $AssetType = $conn->real_escape_string($_POST["AssetType"]);
    $Location = $conn->real_escape_string($_POST["Location"]);
    $Size = $conn->real_escape_string($_POST["Size"]);
    $Value = $conn->real_escape_string($_POST["Value"]);

    // ตรวจสอบว่าฟิลด์ Size และ Value เป็นตัวเลขที่ถูกต้อง
    if (!is_numeric($Size) || !is_numeric($Value)) {
        echo "<script>alert('Please enter valid numbers for Size and Value');</script>";
        echo "<script>window.history.back();</script>";
        exit;
    }

    // ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
    $stmt = $conn->prepare("INSERT INTO assets (AssetType, Location, Size, Value) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdd", $AssetType, $Location, (float)$Size, (float)$Value);

    // ตรวจสอบการเพิ่มข้อมูล
    if ($stmt->execute()) {
        echo "<script>alert('New asset added successfully');</script>";
        echo "<script>window.location.href='add_asset.html';</script>"; // เปลี่ยนกลับไปที่ฟอร์ม
    } else {
        echo "<script>alert('Error: " . htmlspecialchars($stmt->error) . "');</script>";
        echo "<script>window.history.back();</script>"; // กลับไปที่หน้าก่อนหน้า
    }

    $stmt->close(); // ปิด Prepared Statement
}

$conn->close(); // ปิดการเชื่อมต่อ
?>
