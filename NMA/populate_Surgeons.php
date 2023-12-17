// populate_surgeons.php
<?php
include('session.php');


$sql = "SELECT DISTINCT Surgeon, Name FROM SurgerySchedule JOIN Personnel ON SurgerySchedule.Surgeon = Personnel.EmploymentNumber";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['Surgeon'] . "'>" . $row['Name'] . "</option>";
    }
} else {
    echo "<option value='none'>No Surgeons Found</option>";
}
$conn->close();
?>

