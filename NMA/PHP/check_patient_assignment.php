<?php
include('session.php');

header('Content-Type: application/json'); // Ensure JSON content type

if(isset($_POST['patient_id'])) {
    $patientId = $_POST['patient_id'];

    $sql = "SELECT r.RoomNumber, r.BedNumber, p.Name AS 'PatientName' , i.AttendingNurse AS 'NurseID',pe.EmploymentNumber           AS 'DrID', pe.Name 'DrName', na.Name AS 'NurseName'
            FROM Room r 
            INNER JOIN InPatient i on r.CurrentPatient = i.PatientNumber
            INNER JOIN Patient p on i.PatientNumber = p.PatientNumber
            LEFT JOIN Personnel pe on p.PrimaryPhysician = pe.EmploymentNumber
            LEFT JOIN Personnel na on i.AttendingNurse = na.EmploymentNumber 
        WHERE p.PatientNumber = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $patientId);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    if ($row = $result->fetch_assoc()) {
        $data = [
            'drID' => $row['DrID'],
            'drName' => $row['DrName']
        ];
    }

    echo json_encode($data);
    $stmt->close();
    $conn->close();
}
?>
