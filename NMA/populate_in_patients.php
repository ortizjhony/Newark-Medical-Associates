<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "Test - PHP is working"; // Test echo statement

include('session.php');

$sql = "SELECT p.Name, p.PatientNumber FROM InPatient i INNER JOIN Patient p on i.PatientNumber = p.PatientNumber";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option value='".$row["PatientNumber"]."'>".$row["Name"]."</option>";
    }
} else {
    echo "<option value='none'>No patients found</option>";
}

$conn->close();
?>
