<?php
include('session.php');

$sql = "SELECT DISTINCT RoomNumber FROM Room WHERE Occupied = FALSE";
$result = $conn->query($sql);

$rooms = [];
while ($row = $result->fetch_assoc()) {
    $rooms[] = ['roomNumber' => $row['RoomNumber']];
}

echo json_encode($rooms);
$conn->close();
?>
