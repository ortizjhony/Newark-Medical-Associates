<?php
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientId = $_POST['patientId'];

    $sqlDelete = "DELETE FROM Patient WHERE PatientNumber = ?";
    $stmtDelete = $conn->prepare($sqlDelete);
    $stmtDelete->bind_param("i", $patientId);
    $stmtDelete->execute();

    if ($stmtDelete->affected_rows > 0) {
        echo "Patient deleted successfully";
    } else {
        echo "Error: " . $stmtDelete->error;
    }
    $stmtDelete->close();
    $conn->close();

    echo '<a href="index.php"><button>Return to Home Page</button></a>';
    echo '<a href="add_patient.php"><button>Add Another Patient</button></a>';
    // Inside the if block where you display patient data
}
?>
