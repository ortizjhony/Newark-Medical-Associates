<?php
include('session.php');

// Initialize variables for filter criteria
$surgeryRoom = $_POST['surgeryRoom'] ?? '';
$surgeryDate = $_POST['surgeryDates'] ?? '';
$surgeon = $_POST['surgeon'] ?? '';
$patient = $_POST['patient'] ?? '';

// Base query
$sql = "SELECT s.OperationTheatre ,sc.Description, p.Name AS 'PatientName', pe.Name AS 'SurgeonName', DATE_FORMAT(SurgeryDateTime, '%Y-%m-%d') AS 'SurgeryDate'
        FROM SurgerySchedule s
        INNER JOIN SurgerySkill sc on s.SurgeryCode = sc.SkillCode
        INNER JOIN Patient p on p.PatientNumber = s.Patient
        INNER JOIN Personnel pe on s.Surgeon = pe.EmploymentNumber
        WHERE ";

// Array to hold individual conditions
$conditions = [];

// Append conditions based on selected filters
if (!empty($surgeryRoom)) {
    $conditions[] = "OperationTheatre = '$surgeryRoom'";
}
if (!empty($surgeryDate)) {
    $conditions[] = "DATE_FORMAT(SurgeryDateTime, '%Y-%m-%d') = '$surgeryDate'";
}
if (!empty($surgeon)) {
    $conditions[] = "Surgeon = '$surgeon'";
}
if (!empty($patient)) {
    $conditions[] = "Patient = '$patient'";
}

// Combine conditions with AND
$sql .= implode(' AND ', $conditions);

// If no filter is selected, remove the WHERE clause
if (empty($conditions)) {
    $sql = "SELECT s.OperationTheatre ,sc.Description, p.Name AS 'PatientName', pe.Name AS 'SurgeonName', DATE_FORMAT(SurgeryDateTime, '%Y-%m-%d') AS 'SurgeryDate'
            FROM SurgerySchedule s
            INNER JOIN SurgerySkill sc on s.SurgeryCode = sc.SkillCode
            INNER JOIN Patient p on p.PatientNumber = s.Patient
            INNER JOIN Personnel pe on s.Surgeon = pe.EmploymentNumber";
}

// Execute the query
$result = $conn->query($sql);

echo "<h2>Surgery Schedule</h2>";
echo "<p>Filter Conditions:</p>";
echo "<ul>";
echo "<li>Surgery Room: " . htmlspecialchars($surgeryRoom) . "</li>";
echo "<li>Surgery Date: " . htmlspecialchars($surgeryDate) . "</li>";
echo "<li>Surgeon ID: " . htmlspecialchars($surgeon) . "</li>";
echo "<li>Patient ID: " . htmlspecialchars($patient) . "</li>";
echo "</ul>";

echo "<h2>Surgery Schedule</h2>";
echo "<table border='1'><tr><th>Description</th><th>OperationTheatre</th><th>SurgeryDate</th><th>SurgeonName</th><th>PatientName</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row['Description'] . "</td><td>" . $row['OperationTheatre'] . "</td><td>" . $row['SurgeryDate'] . "</td><td>" . $row['SurgeonName'] . "</td><td>" . $row['PatientName'] . "</td></tr>";
}

echo "</table>";


$conn->close();

echo '<a href="view_schedule_surgery.php"><button>Return to View Schedule</button></a>';
echo '<a href="index.php"><button>Return to Home Page</button></a>';
?>
