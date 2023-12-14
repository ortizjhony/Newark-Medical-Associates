<?php
include('session.php');

$sql = "SELECT DISTINCT OperationTheatre FROM SurgerySchedule";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['OperationTheatre'] . "'>" . $row['OperationTheatre'] . "</option>";
    }
} else {
    echo "<option value='none'>No Surgery Rooms Found</option>";
}
$conn->close();
?>
