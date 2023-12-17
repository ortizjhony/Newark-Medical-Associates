<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>Assign Doctor</title>


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

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['patient_id']) && isset($_POST['doctor_id'])) {
                    $patientId = $_POST['patient_id'];
                    $doctorId = $_POST['doctor_id'];

                    // SQL query to assign the doctor to the patient
                    $sql = "UPDATE Patient SET PrimaryPhysician = ? WHERE PatientNumber = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ii", $doctorId, $patientId);

                    if ($stmt->execute()) {
                        echo "Doctor assigned to patient successfully.";
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    $stmt->close();
                    $conn->close();

                    // Redirect back to display_current_assignments.php
                    header("Location: display_current_assignments.php");
                    exit();
                } else {
                    echo "Invalid request method.";
                    
                }
                ?>
            </div>
            

            <div class="row justify-content-between">
                
                <div class="col-1"> </div>
                <div class="col-6">    
                    <a href="display_current_assignments.php"><button type="button" class="btn mb-1 btn-primary">Return to Assignments</button></a>
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







