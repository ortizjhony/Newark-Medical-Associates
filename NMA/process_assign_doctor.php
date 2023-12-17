<?php
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['patient_id']) && isset($_POST['doctor_id'])) {
    $patientId = $_POST['patient_id'];
    $doctorId = $_POST['doctor_id'];

    // SQL query to assign the doctor to the patient
    $sql = "UPDATE Patient SET PrimaryPhysician = ? WHERE PatientNumber = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $doctorId, $patientId);

    if ($stmt->execute()) {
        echo "Doctor assigned to patient successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect back to display_current_assignments.php
    header("Location: display_current_assignments.php");
    exit();
} else {
    echo "Invalid request method.";
    // Redirect back or provide a link for manual redirection
    echo '<a href="display_current_assignments.php">Return to Assignments</a>';
}
?>
