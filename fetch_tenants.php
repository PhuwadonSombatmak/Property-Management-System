<?php
include 'db_connection.php';

$sql = "SELECT * FROM Tenants";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Tenant ID</th><th>Tenant Name</th><th>Contact Number</th><th>Lease Start</th><th>Lease End</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["TenantID"] . "</td><td>" . $row["TenantName"] . "</td><td>" . $row["ContactNumber"] . "</td><td>" . $row["LeaseStart"] . "</td><td>" . $row["LeaseEnd"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No tenants found.";
}

$conn->close();
?>
