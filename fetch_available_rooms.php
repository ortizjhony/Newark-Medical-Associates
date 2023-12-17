<?php
include('session.php');

$sql = "SELECT RoomNumber, BedNumber, CASE WHEN Occupied = TRUE THEN 'Booked' ELSE 'Available' END AS 'Availability' FROM Room";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-striped table-bordered zero-configuration'>";
    echo "<tr><th>Room Number</th><th>Bed Number</th><th>Availability</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["RoomNumber"] . "</td>";
        echo "<td>" . $row["BedNumber"] . "</td>";
        echo "<td>" . $row["Availability"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No available rooms or beds found";
}

$conn->close();

?>
