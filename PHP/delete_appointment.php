<?php
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $consultationID = $_POST['consultationID'];

    // Debugging: Echo the ConsultationID
    #echo "Consultation ID to delete: " . $consultationID . "<br>";

    $sqlDelete = "DELETE FROM Consultation WHERE consultationID = ?";
    $stmtDelete = $conn->prepare($sqlDelete);

    if ($stmtDelete === false) {
        die("Error in SQL preparation: " . $conn->error);
    }

    $stmtDelete->bind_param("i", $consultationID);
    $stmtDelete->execute();

    if ($stmtDelete->affected_rows > 0) {
        echo "Appointment deleted successfully";
    } else {
        echo "Error: " . $stmtDelete->error;
    }

    $stmtDelete->close();
    $conn->close();
}

// Links to return or schedule another appointment
echo '<a href="index.php"><button>Return to Home Page</button></a>';
echo '<a href="schedule_appointment_form.php"><button>Schedule Another Appointment</button></a>';
?>
