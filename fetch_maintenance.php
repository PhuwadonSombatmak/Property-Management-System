<?php
include 'db_connection.php';

$sql = "SELECT * FROM Maintenance";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Maintenance ID</th><th>Asset ID</th><th>Issue</th><th>Date Reported</th><th>Cost</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["MaintenanceID"] . "</td><td>" . $row["AssetID"] . "</td><td>" . $row["Issue"] . "</td><td>" . $row["DateReported"] . "</td><td>" . $row["Cost"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No maintenance records found.";
}

$conn->close();
?>
