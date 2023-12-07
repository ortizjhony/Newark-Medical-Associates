<?php
include('session.php');

// Fetch patients without assigned doctors
$sqlPatients = "SELECT i.PatientNumber, p.Name 
                FROM InPatient i
                INNER JOIN Patient p On i.PatientNumber = p.PatientNumber
                WHERE AttendingNurse IS NULL";
$resultPatients = $conn->query($sqlPatients);

// Fetch all doctors
$sqlNurse = "SELECT EmploymentNumber, Name FROM Personnel WHERE Role = 'Nurse'";
$resultNurses = $conn->query($sqlNurse);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Assign Nurse to Patient</title>
</head>
<body>
    <h2>Assign Nurse to Patient</h2>
    <form action="process_assign_nurse.php" method="post">

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
        <label for="nurse">Select Nurse:</label>
        <select name="nurse_id" id="nurse">
            <?php 
            if ($resultNurses->num_rows > 0) {
                while($row = $resultNurses->fetch_assoc()) {
                    echo "<option value='" . $row['EmploymentNumber'] . "'>" . $row['Name'] . "</option>";
                }
            } else {
                echo "<option>No nurses found</option>";
            }
            ?>
        </select><br>

        <input type="submit" value="Assign Nurse">
    </form>

    <a href="display_current_nurse_assignments.php"><button>Return to Assignments</button></a>
</body>
</html>

