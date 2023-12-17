<?php
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['patient_id'])) {
    $patientId = $_POST['patient_id'];

    // SQL query to remove the doctor from the patient
    $sql = "UPDATE Patient SET PrimaryPhysician = NULL WHERE PatientNumber = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $patientId);

    if ($stmt->execute()) {
        echo "Doctor removed from patient successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect back to display_current_assignments.php
    header("Location: display_current_assignments.php");
    exit();
}
?>
