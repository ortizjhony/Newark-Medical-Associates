<?php
include('session.php');

include('session.php');

$sql = "SELECT DISTINCT DATE_FORMAT(SurgeryDateTime, '%Y-%m-%d') AS 'Dates' FROM SurgerySchedule ORDER BY SurgeryDateTime";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['Dates'] . "'>" "</option>";
    }
} else {
    echo "<option value='none'>No Surgery Rooms Found</option>";
}
$conn->close();

?>



