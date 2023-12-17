<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "Test - PHP is working"; // Test echo statement

include('session.php');

$sql = "SELECT DISTINCT Role FROM Personnel";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // The text displayed in the dropdown should be the job role
        echo "<option value='" . $row["Role"] . "'>" . $row["Role"] . "</option>";
    }
} else {
    echo "<option value='none'>No Job Types Found</option>";
}
$conn->close();
?>
