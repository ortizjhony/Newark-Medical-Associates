<?php
include('session.php');

// Fetch patients with assigned doctors
$sql = "SELECT p.PatientNumber, p.Name AS PatientName, d.Name AS DoctorName 
        FROM Patient p 
        INNER JOIN Personnel d ON p.PrimaryPhysician = d.EmploymentNumber 
        WHERE d.Role = 'Physician' OR d.Role = 'Surgeon'";

$result = $conn->query($sql);

echo "<h2>Remove Doctor Assignment</h2>";
echo "<form action='process_doctor_remove_assignment.php' method='post'>";
echo "<table border='1'><tr><th>Patient</th><th>Current Doctor</th><th>Action</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row['PatientName'] . "</td><td>" . $row['DoctorName'] . "</td>";
    echo "<td><button type='submit' name='patient_id' value='" . $row['PatientNumber'] . "'>Remove</button></td></tr>";
}

echo "</table>";
echo "</form>";
$conn->close();

echo '<a href="display_current_assignments.php"><button>Return to View In-Patient Doctor Assingments</button></a>';
echo '<a href="index.php"><button>Return to Home Page</button></a>';
?>
