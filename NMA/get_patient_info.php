<?php
include('session.php');

$sql = "SELECT pa.PatientNumber, pa.Name, pa.Gender, pa.DateOfBirth, pa.Address, pa.TelephoneNumber,pa.BloodType, CASE WHEN pa.PrimaryPhysician is NULL THEN 'No - Chief of Staff Assigned' ELSE 'Yes - Primary Physician Assigned' END AS 'PhysicianAssigned', CASE WHEN pe.Name IS NULL THEN '' ELSE pe.NAME END AS 'PhysicianName' FROM Patient pa LEFT JOIN Personnel pe on pa.PrimaryPhysician = pe.EmploymentNumber;";
$result = $conn->query($sql);

echo "<table class='table table-striped table-bordered zero-configuration'>";
echo "<tr><th>Patient ID</th><th>Name</th><th>Gender</th><th>Date of Birth</th><th>Address</th><th>Telephone Number</th><th>Blood Type</th><th>Primary Physician</th><th>Physician Name</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["PatientNumber"] . "</td>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["Gender"] . "</td>";
        echo "<td>" . $row["DateOfBirth"] . "</td>";
        echo "<td>" . $row["Address"] . "</td>";
        echo "<td>" . $row["TelephoneNumber"] . "</td>";
        echo "<td>" . $row["BloodType"] . "</td>";
        echo "<td>" . $row["PhysicianAssigned"] . "</td>";
        echo "<td>" . $row["PhysicianName"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No patients found</td></tr>";
}

echo "</table>";
$conn->close();
?>

