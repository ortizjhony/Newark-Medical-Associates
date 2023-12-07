<?php
include('session.php');

$sql = "SELECT p.Name AS PatientName, d.Name AS NurseName, d.Role
        FROM InPatient i 
        INNER JOIN Patient p ON i.PatientNumber = p.PatientNumber 
        INNER JOIN Personnel d ON i.AttendingNurse = d.EmploymentNumber
        WHERE d.Role = 'Nurse' ";

$result = $conn->query($sql);

echo "<h2>Current In-Patient Nurse Assignments</h2>";
echo "<table border='1'><tr><th>Patient</th><th>Assigned Nurse</th><th>Role</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row['PatientName'] . "</td><td>" . $row['NurseName'] . "</td><td>" . $row['Role'] . "</td></tr>";
}

echo "</table>";

// Buttons to direct to remove or assign doctor pages
echo "<br><a href='remove_nurse_assignment.php'><button>Remove Nurse Assignment</button></a>";
echo "<a href='assign_nurse.php'><button>Assign Nurse</button></a>";
echo '<a href="Patient_Personnel_Assignments.php"><button>Return to In-Patient Management</button></a>';
echo '<a href="index.php"><button>Return to Home Page</button></a>';

$conn->close();
?>