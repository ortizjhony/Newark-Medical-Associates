 <?php
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctorId = $_POST['doctor_id'];
    $scheduleDate = $_POST['schedule_date'];

    // Modify the query to include the doctor's name
    $sql = "SELECT c.ConsultationDateTime, p.Name AS PatientName, doc.Name AS DoctorName, c.Notes, c.ConsultationID
            FROM Consultation c
            INNER JOIN Patient p ON c.PatientNumber = p.PatientNumber
            INNER JOIN Personnel doc ON c.PhysicianNumber = doc.EmploymentNumber
            WHERE c.PhysicianNumber = ? AND DATE(c.ConsultationDateTime) = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $doctorId, $scheduleDate);
    $stmt->execute();
    $result = $stmt->get_result();

    $doctorName = "";
    if ($row = $result->fetch_assoc()) {
        // Fetch and store the doctor's name
        $doctorName = $row['DoctorName'];

        // Start the table and print the first row
        echo "<h2>Schedule for Doctor: $doctorName on $scheduleDate</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Time</th><th>Patient Name</th><th>Reason for Consulation</th><th></th></tr>";
        echo "<tr>";
        echo "<td>" . $row["ConsultationDateTime"] . "</td>";
        echo "<td>" . $row["PatientName"] . "</td>";
        echo "<td>" . $row["Notes"] . "</td>";
        echo "<td><a href='consulation_details_form.php?consultation_id=" . $row["ConsultationID"] . "'><button>Enter Consulation</button></a></td>";
        echo "</tr>";

        // Continue fetching the rest of the rows.
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ConsultationDateTime"] . "</td>";
            echo "<td>" . $row["PatientName"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<h2>No appointments found for Doctor ID: $doctorId on $scheduleDate</h2>";
    }

    if ($doctorName != "") {
        echo "</table>";
    }

    $stmt->close();
} else {
    echo "Invalid request method.";
}

$conn->close();

echo '<a href="view_schedule.php"><button>Return to View Schedule</button></a>';
echo '<a href="index.php"><button>Return to Home Page</button></a>';

?>
