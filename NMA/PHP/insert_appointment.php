<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>Insert Appointment</title>


    </head>
<body>
<div id="main-wrapper">
    
    <?php
        include('navigation.php');
        ?>
  
  <div class="content-body">
    <div class="container-fluid">

      
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

            <div id="room-data">
                
            <?php
                include('session.php');

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Retrieve form data
                    $patientId = $_POST['patient_id'];
                    $physicianNumber = $_POST['physician_number'];
                    $appointmentDateTime = $_POST['appointment_datetime'];
                    $notes = $_POST['notes'];

                    // Echo form data for debugging purposes
                    // echo "Patient ID: " . $patientId . "<br>";
                    // echo "Physician Number: " . $physicianNumber . "<br>";
                    // echo "Appointment DateTime: " . $appointmentDateTime . "<br>";
                    // echo "Notes: " . $notes . "<br>";

                    // Prepare and execute SQL statement
                    $stmt = $conn->prepare("INSERT INTO Consultation (PatientNumber, PhysicianNumber, ConsultationDateTime, Notes) VALUES (?, ?, ?, ?)");
                    if ($stmt === false) {
                        die("Error in SQL preparation: " . $conn->error);
                    }
                    $stmt->bind_param("iiss", $patientId, $physicianNumber, $appointmentDateTime, $notes);
                    $stmt->execute();

                    // Check if the appointment is successfully scheduled
                    if ($stmt->affected_rows > 0) {
                        $consultationId = $conn->insert_id;
                        echo "Appointment scheduled successfully<br>";

                        // Query to get the newly added appointment's details
                        $sqlSelect = "SELECT c.ConsultationID, pe.Name AS 'PhysicianName', pa.Name AS 'PatientName', DATE_FORMAT(c.ConsultationDateTime, '%m/%d/%Y %h:%i%p') AS 'AppointmentTime'
                            FROM Consultation c 
                            INNER JOIN Personnel pe ON c.PhysicianNumber = pe.EmploymentNumber 
                            INNER JOIN Patient pa ON c.PatientNumber = pa.PatientNumber 
                            WHERE c.ConsultationID = ?";
                        $stmtSelect = $conn->prepare($sqlSelect);
                        $stmtSelect->bind_param("i", $consultationId);
                        $stmtSelect->execute();
                        $resultSelect = $stmtSelect->get_result();

                        if ($row = $resultSelect->fetch_assoc()) {
                            echo "Consultation Number: " . $row["ConsultationID"] . "<br>";
                            echo "Doctor: " . $row["PhysicianName"] . "<br>";
                            echo "Patient: " . $row["PatientName"] . "<br>";
                            echo "Appointment Time: " . $row["AppointmentTime"] . "<br>";

                            // Form for deleting the appointment
                            echo '<form action="delete_appointment.php" method="post">';
                            echo '<input type="hidden" name="consultationID" value="' . $row["ConsultationID"] . '">';
                            echo '<input type="submit" value="Delete Appointment">';
                            echo '</form>';
                        }
                        $stmtSelect->close();
                    } else {
                        echo "Error scheduling appointment: " . $stmt->error;
                    }
                    $stmt->close();
                    $conn->close();
                } else {
                    echo "Invalid request method.";
                }

                ?>
            </div>
            

            <div class="row justify-content-between">
                
                <div class="col-1"> </div>
                <div class="col-6">    
                    <a href="schedule_appointment_form.php"><button type="button" class="btn mb-1 btn-primary">Schedule Another Appointment</button></a>
                    <a href="index.php"><button type="button" class="btn mb-1 btn-primary">Return to Home Page</button></a>
                </div>
            </div>
                                </div>
                        </div>
                    </div>
            </div>
        


        </div>
    </div>
</div>



<script src="/NMA/bootstrap-theme/theme/plugins/common/common.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/custom.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/settings.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/gleek.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/styleSwitcher.js"></script>

</body>
</html>







