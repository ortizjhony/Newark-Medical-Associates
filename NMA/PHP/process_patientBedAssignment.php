<?php
include('session.php');

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientId = $_POST['patient_id'];
    $roomId = $_POST['room_id'];
    $bedNumber = $_POST['bed_number'];
    $action = $_POST['action'];


    if ($action == 'assign') {
        // Assign patient to room/bed
        // Ensure that the room and bed are available before assigning
        $assignSql = "UPDATE Room SET Occupied = TRUE, CurrentPatient = ? WHERE RoomNumber = ? AND BedNumber = ? AND Occupied = FALSE";
        $stmt = $conn->prepare($assignSql);
        $stmt->bind_param("iss", $patientId, $roomId, $bedNumber); // "iss" for integer, string, string
        if ($stmt->execute()) {
            echo "Patient assigned to room/bed successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else if ($action == 'remove') {
        // Remove patient from room/bed
        $removeSql = "UPDATE Room SET Occupied = FALSE, CurrentPatient = NULL WHERE CurrentPatient = ?";
        $stmt = $conn->prepare($removeSql);
        $stmt->bind_param("i", $patientId);
        if ($stmt->execute()) {
            echo "Patient removed from room/bed successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Invalid action.";
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}

echo '<a href="patientBedAssignment.php"><button>Return to Assignment Page</button></a>';
echo '<a href="index.php"><button>Return to Home Page</button></a>';
?>
