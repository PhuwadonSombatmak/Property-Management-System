<?php
include 'db_connection.php';

$sql = "SELECT * FROM Leases";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Lease ID</th><th>Asset ID</th><th>Tenant ID</th><th>Lease Start</th><th>Lease End</th><th>Monthly Rent</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["LeaseID"] . "</td><td>" . $row["AssetID"] . "</td><td>" . $row["TenantID"] . "</td><td>" . $row["LeaseStart"] . "</td><td>" . $row["LeaseEnd"] . "</td><td>" . $row["MonthlyRent"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No leases found.";
}

$conn->close();
?>
