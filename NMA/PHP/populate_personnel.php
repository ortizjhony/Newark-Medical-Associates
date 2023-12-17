<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "Test - PHP is working"; // Test echo statement

include('session.php');

$sql = "SELECT EmploymentNumber, Name FROM Personnel";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option value='".$row["EmploymentNumber"]."'>".$row["Name"]."</option>";
    }
} else {
    echo "<option value='none'>No Personnel found</option>";
}

$conn->close();
?>
