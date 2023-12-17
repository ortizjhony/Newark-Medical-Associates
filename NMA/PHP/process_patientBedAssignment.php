<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>Insert Patient</title>


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
                            echo "<p>Patient assigned to room/bed successfully.</p>";
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
                            echo "<p>Patient removed from room/bed successfully.</p>";
                        } else {
                            echo "Error: " . $stmt->error;
                        }
                        $stmt->close();
                    } else {
                        echo "<p>Invalid action.</p>";
                    }

                    $conn->close();
                } else {
                    echo "<p>Invalid request method.</p>";
                }

                ?>
            </div>
            

            <div class="row justify-content-between">
                
                <div class="col-1"> </div>
                <div class="col-6">    
                    <a href="patientBedAssignment.php"><button type="button" class="btn mb-1 btn-primary">Return to Assignment Page</button></a>
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







