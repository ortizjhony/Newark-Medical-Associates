<?php
include('session.php');

$sql = "SELECT DISTINCT DATE_FORMAT(SurgeryDateTime, '%m/%d/%Y') AS 'Dates' FROM SurgerySchedule";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['Dates'] . "'>""</option>";
    }
} else {
    echo "<option value='none'>No Surgery Dates Found</option>";
}
$conn->close();
?>