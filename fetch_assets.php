<?php
$servername = "localhost"; // ชื่อ container ใน Docker
$username = "root"; // ชื่อผู้ใช้ฐานข้อมูล
$password = ""; // รหัสผ่าน
$dbname = "propertymanagement"; // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อกับฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query เพื่อดึงข้อมูลจากตาราง assets
$sql = "SELECT * FROM assets";
$result = $conn->query($sql);

// ตรวจสอบว่ามีข้อมูลหรือไม่
if ($result->num_rows > 0) {
    echo "<ul>";
    // แสดงข้อมูลแต่ละแถว
    while($row = $result->fetch_assoc()) {
        echo "<li>Asset Type: " . $row["AssetType"] . " | Location: " . $row["Location"] . " | Size: " . $row["Size"] . " sqm | Value: " . $row["Value"] . " THB</li>";
    }
    echo "</ul>";
} else {
    echo "No assets found.";
}

// ปิดการเชื่อมต่อ
$conn->close();
?>
