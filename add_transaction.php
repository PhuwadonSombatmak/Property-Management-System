<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $TransactionType = $_POST["TransactionType"];
    $AssetID = $_POST["AssetID"];
    $Date = $_POST["Date"];
    $Amount = $_POST["Amount"];

    // เพิ่มธุรกรรมลงในฐานข้อมูล
    $sql = "INSERT INTO Transactions (TransactionType, AssetID, Date, Amount) VALUES ('$TransactionType', '$AssetID', '$Date', '$Amount')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Transaction added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
