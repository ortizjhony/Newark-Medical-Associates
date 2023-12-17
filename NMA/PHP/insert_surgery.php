<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientId = (int)$_POST['patient_id'];
    $surgeonNumber = (int)$_POST['surgeon_number'];
    $appointmentDateTime = $_POST['appointment_datetime'];
    $appointmentDateTimeFormatted = date("Y-m-d H:i:s", strtotime($appointmentDateTime));

    $surgeryRoom = $_POST['surgeryRoom'];
    $skillCode = $_POST['surgeryType'];


    $stmt = $conn->prepare("INSERT INTO SurgerySchedule (Patient, Surgeon, SurgeryDateTime, SurgeryCode, OperationTheatre) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error in SQL preparation: " . $conn->error);
    }
    $stmt->bind_param("iisss", $patientId, $surgeonNumber, $appointmentDateTimeFormatted, $skillCode, $surgeryRoom);

    if ($stmt->execute()) {
        echo "Surgery scheduled successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Invalid request method.";
}

$conn->close();

echo '<form action="schedule_surgery_form.php" method="get">';
echo '<button type="submit">Schedule Another Surgery</button>';
echo '</form>';

echo '<form action="view_schedule_surgery.php" method="get">';
echo '<button type="submit">Go to View Surgery Schedule</button>';
echo '</form>';

echo '<form action="index.php" method="get">';
echo '<button type="submit">Return to Home Page</button>';
echo '</form>';
?>
