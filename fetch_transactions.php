<?php
include 'db_connection.php';

$sql = "SELECT * FROM Transactions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Transaction ID</th><th>Transaction Type</th><th>Asset ID</th><th>Date</th><th>Amount</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["TransactionID"] . "</td><td>" . $row["TransactionType"] . "</td><td>" . $row["AssetID"] . "</td><td>" . $row["Date"] . "</td><td>" . $row["Amount"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No transactions found.";
}

$conn->close();
?>
