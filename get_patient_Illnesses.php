<?php
include('session.php');

$sql = "SELECT p.PatientNumber, p.Name, il.Description AS 'Illness', DATE_FORMAT(c.ConsultationDateTime, '%m/%d/%Y') AS 'DateDiagnosed'
            FROM Patient p
            INNER JOIN Consultation c ON c.PatientNumber = p.PatientNumber 
            LEFT JOIN PatientIllness pi ON c.ConsultationID = pi.ConsultationID
            INNER JOIN Illness il on pi.IllnessCode = il.IllnessCode";
$result = $conn->query($sql);


echo "<table class='table table-striped table-bordered zero-configuration'>";
echo "<tr><th>Patient ID</th><th>Patient Name</th><th>Illness</th><th>Date of Diagnosis</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["PatientNumber"] . "</td>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["Illness"] . "</td>";
        echo "<td>" . $row["DateDiagnosed"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No patients found</td></tr>";
}

echo "</table>";
$conn->close();
?>


