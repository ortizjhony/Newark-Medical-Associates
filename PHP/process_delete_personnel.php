<?php
include('session.php'); // Ensure this is the correct path to your session file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $personnelID = $_POST['id'];

    // SQL query to delete personnel
    $sql = "DELETE FROM Personnel WHERE EmploymentNumber = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing the query: " . $conn->error);
    }

    $stmt->bind_param("i", $personnelID);

    if ($stmt->execute()) {
        echo "Personnel deleted successfully.";
    } else {
        echo "Error deleting personnel: " . $stmt->error;
    }

    $stmt->close();
}

echo "<a href='delete_personnel.php'><button>Delete Another Personnel</button></a>";
echo '<a href="Personnel.php"><button>Return to View Staff Page</button></a>';
echo "<a href='index.php'><button>Return to Home Page</button></a>";

$conn->close();

?>