
<?php
include('session.php');


$sql = "SELECT DISTINCT Patient, Name FROM SurgerySchedule JOIN Patient ON SurgerySchedule.Patient = Patient.PatientNumber";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['Patient'] . "'>" . $row['Name'] . "</option>";
    }
} else {
    echo "<option value='none'>No Patients Found</option>";
}
$conn->close();
?>


