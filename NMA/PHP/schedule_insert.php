<?php
include('session.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employmentNumber = $_POST['employmentNumber'];
    $shiftDate = $_POST['shiftDate'];
    $shiftStart = $_POST['shiftStart'];
    $shiftEnd = $_POST['shiftEnd'];

    $sql = "INSERT INTO JobShift (EmploymentNumber, ShiftDate, ShiftStart, ShiftEnd) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $employmentNumber, $shiftDate, $shiftStart, $shiftEnd);

    if ($stmt->execute()) {
        echo "Job shift scheduled successfully.";
    } else {
        echo "Error scheduling job shift: " . $conn->error;
    }
    $conn->close();
}
?>
