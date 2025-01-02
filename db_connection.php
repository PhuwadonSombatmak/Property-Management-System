<?php
function getDbConnection() {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'propertymanagement';

    // สร้างการเชื่อมต่อกับฐานข้อมูล
    $conn = new mysqli($servername, $username, $password, $dbname);

    // ตรวจสอบการเชื่อมต่อและจัดการข้อผิดพลาด
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>
