<?php
include('session.php');

header('Content-Type: application/json'); // Ensure JSON content type

$sql = "SELECT EmploymentNumber, Name FROM Personnel WHERE Role = 'Physician' OR Role = 'Surgeon'";
$result = $conn->query($sql);

$doctors = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $doctors[] = [
            'eNumber' => $row['EmploymentNumber'],
            'doctorName' => $row['Name']
        ];
    }
}

echo json_encode($doctors);
$conn->close();
?>

