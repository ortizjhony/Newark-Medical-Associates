<?php
include('session.php');

$sql = "SELECT EmploymentNumber, Name FROM Personnel WHERE Role = 'Surgeon'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option value='".$row["EmploymentNumber"]."'>".$row["Name"]."</option>";
    }
} else {
    echo "<option value='none'>No doctors found</option>";
}
$conn->close();
?>