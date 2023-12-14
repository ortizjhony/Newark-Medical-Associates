<?php
include('session.php');

$sql = "SELECT p.Name AS PatientName, d.Name AS DoctorName 
        FROM InPatient i 
        INNER JOIN Patient p ON i.PatientNumber = p.PatientNumber 
        LEFT JOIN Personnel d ON p.PrimaryPhysician = d.EmploymentNumber 
        WHERE d.Role = 'Physician' OR d.Role = 'Surgeon'";

$result = $conn->query($sql);

echo "<h2>Current In-Patient Doctor Assignments</h2>";
echo "<table border='1'><tr><th>Patient</th><th>Assigned Doctor</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row['PatientName'] . "</td><td>" . $row['DoctorName'] . "</td></tr>";
}

echo "</table>";

// Buttons to direct to remove or assign doctor pages
echo "<br><a href='remove_doctor_assignment.php'><button>Remove Doctor Assignment</button></a>";
echo "<a href='assign_doctor.php'><button>Assign Doctor</button></a>";
echo '<a href="Patient_Personnel_Assignments.php"><button>Return to In-Patient Management</button></a>';
echo '<a href="index.php"><button>Return to Home Page</button></a>';

$conn->close();
?>
