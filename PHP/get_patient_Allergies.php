<?php
include('session.php');

$sql = "SELECT p.PatientNumber, p.Name, il.Description AS 'Allergy', DATE_FORMAT(c.ConsultationDateTime, '%m/%d/%Y') AS 'DateDiagnosed'
            FROM Patient p
            INNER JOIN Consultation c ON c.PatientNumber = p.PatientNumber 
            LEFT JOIN PatientAllergy pi ON c.ConsultationID = pi.ConsultationID
            INNER JOIN Allergy il on pi.AllergyCode = il.AllergyCode";
$result = $conn->query($sql);


echo "<table border='1'>";
echo "<tr><th>Patient ID</th><th>Patient Name</th><th>Allergy</th><th>Date of Diagnosis</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["PatientNumber"] . "</td>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["Allergy"] . "</td>";
        echo "<td>" . $row["DateDiagnosed"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No patients found</td></tr>";
}

echo "</table>";
$conn->close();
?>


