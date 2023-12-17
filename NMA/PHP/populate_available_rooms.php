<?php
include('session.php');

$sql = "SELECT DISTINCT RoomNumber FROM Room WHERE Occupied = FALSE";
$result = $conn->query($sql);

$rooms = [];
while ($row = $result->fetch_assoc()) {
    $rooms[] = ['RoomNumber' => $row['RoomNumber']];
    echo "<option value='".$row["RoomNumber"]."'>".$row["RoomNumber"]."</option>";
}

echo json_encode($rooms);
$conn->close();
?>
