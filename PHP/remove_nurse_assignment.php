<?php
include('session.php');

// Fetch patients with assigned nurses
$sql = "SELECT p.PatientNumber,p.Name AS PatientName, d.Name AS NurseName, d.Role
        FROM InPatient i 
        INNER JOIN Patient p ON i.PatientNumber = p.PatientNumber 
        INNER JOIN Personnel d ON i.AttendingNurse = d.EmploymentNumber
        WHERE d.Role = 'Nurse' ";

$result = $conn->query($sql);

echo "<h2>Remove Nurse Assignment</h2>";
echo "<form action='process_nurse_remove_assignment.php' method='post'>";
echo "<table border='1'><tr><th>Patient</th><th>Current Nurse</th><th>Action</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row['PatientName'] . "</td><td>" . $row['NurseName'] . "</td>";
    echo "<td><button type='submit' name='patient_id' value='" . $row['PatientNumber'] . "'>Remove</button></td></tr>";
}

echo "</table>";
echo "</form>";
$conn->close();

echo '<a href="display_current_nurse_assignments.php"><button>Return to View In-Patient Nurse Assingments</button></a>';
echo '<a href="index.php"><button>Return to Home Page</button></a>';
?>