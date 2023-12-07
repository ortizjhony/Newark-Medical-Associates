<?php
include('session.php');

// Fetch patients without assigned doctors
$sqlPatients = "SELECT PatientNumber, Name FROM Patient WHERE PrimaryPhysician IS NULL";
$resultPatients = $conn->query($sqlPatients);

// Fetch all doctors
$sqlDoctors = "SELECT EmploymentNumber, Name FROM Personnel WHERE Role = 'Physician' OR Role = 'Surgeon'";
$resultDoctors = $conn->query($sqlDoctors);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Assign Doctor to Patient</title>
</head>
<body>
    <h2>Assign Doctor to Patient</h2>
    <form action="process_assign_doctor.php" method="post">

        <!-- Dropdown for Patients -->
        <label for="patient">Select Patient:</label>
        <select name="patient_id" id="patient">
            <?php 
            if ($resultPatients->num_rows > 0) {
                while($row = $resultPatients->fetch_assoc()) {
                    echo "<option value='" . $row['PatientNumber'] . "'>" . $row['Name'] . "</option>";
                }
            } else {
                echo "<option>No patients found</option>";
            }
            ?>
        </select><br>

        <!-- Dropdown for Doctors -->
        <label for="doctor">Select Doctor:</label>
        <select name="doctor_id" id="doctor">
            <?php 
            if ($resultDoctors->num_rows > 0) {
                while($row = $resultDoctors->fetch_assoc()) {
                    echo "<option value='" . $row['EmploymentNumber'] . "'>" . $row['Name'] . "</option>";
                }
            } else {
                echo "<option>No doctors found</option>";
            }
            ?>
        </select><br>

        <input type="submit" value="Assign Doctor">
    </form>

    <a href="display_current_assignments.php"><button>Return to Assignments</button></a>
</body>
</html>

