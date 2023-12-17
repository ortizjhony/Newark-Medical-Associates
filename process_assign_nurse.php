<?php
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['patient_id']) && isset($_POST['nurse_id'])) {
    $patientId = $_POST['patient_id'];
    $nurseId = $_POST['nurse_id'];

    // SQL query to assign the nurse to the patient
    $sql = "UPDATE InPatient SET AttendingNurse = ? WHERE PatientNumber = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $nurseId, $patientId);

    if ($stmt->execute()) {
        echo "Nurse assigned to patient successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect back to display_current_nurse_assignments.php
    header("Location: display_current_nurse_assignments.php");
    exit();
} else {
    echo "Invalid request method.";
    // Redirect back or provide a link for manual redirection
    echo '<a href="display_current_nurse_assignments.php">Return to Assignments</a>';
}
?>
