<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>Insert Surgery</title>


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
                ini_set('display_errors', 1);
                error_reporting(E_ALL);
                

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $patientId = (int)$_POST['patient_id'];
                    $surgeonNumber = (int)$_POST['surgeon_number'];
                    $appointmentDateTime = $_POST['appointment_datetime'];
                    $appointmentDateTimeFormatted = date("Y-m-d H:i:s", strtotime($appointmentDateTime));

                    $surgeryRoom = $_POST['surgeryRoom'];
                    $skillCode = $_POST['surgeryType'];


                    $stmt = $conn->prepare("INSERT INTO SurgerySchedule (Patient, Surgeon, SurgeryDateTime, SurgeryCode, OperationTheatre) VALUES (?, ?, ?, ?, ?)");
                    if ($stmt === false) {
                        die("Error in SQL preparation: " . $conn->error);
                    }
                    $stmt->bind_param("iisss", $patientId, $surgeonNumber, $appointmentDateTimeFormatted, $skillCode, $surgeryRoom);

                    if ($stmt->execute()) {
                        echo "Surgery scheduled successfully.";
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Invalid request method.";
                }

                $conn->close();

                ?>
            </div>
            

            <div class="row justify-content-between">
                
                <div class="col-1"> </div>
                <div class="col-6">    
                    <a href="schedule_surgery_form.php"><button type="button" class="btn mb-1 btn-primary">Schedule Another Surgery</button></a>
                    <a href="view_schedule_surgery.php"><button type="button" class="btn mb-1 btn-primary">View Surgery Schedule</button></a>
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







