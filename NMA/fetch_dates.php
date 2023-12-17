<?php
include('session.php');

if(isset($_POST['doctor_id'])) {
    $doctorId = $_POST['doctor_id'];

    $sql = "SELECT DISTINCT DATE(c.ConsultationDateTime) as AvailableDate, p.Name
            FROM Consultation c
            INNER JOIN Personnel p on c.PhysicianNumber = p.EmploymentNumber
            WHERE c.PhysicianNumber = ?
            ORDER BY AvailableDate";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $doctorId);
    $stmt->execute();
    $result = $stmt->get_result();

    $dates = [];
    while ($row = $result->fetch_assoc()) {
        $dates[] = $row['AvailableDate'];
    }

    echo json_encode($dates);
    $stmt->close();
    $conn->close();
}
?>
