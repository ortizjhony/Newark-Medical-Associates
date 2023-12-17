<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include('session.php');
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>Schedule a Surgery</title>
    <script>
        function handlePatientTypeChange() {
            var patientType = document.getElementById("patientType").value;
            var existingPatientForm = document.getElementById("existingPatientForm");
            var newPatientLink = document.getElementById("newPatientLink");

            if (patientType === "new") {
                window.location.href = "add_patient_form.php"; // Redirect to new patient form
            } else if (patientType === "existing") {
                existingPatientForm.style.display = "block";
                newPatientLink.style.display = "none";
            }
        }
    </script>
</head>
<body>

<div id="main-wrapper">
        
    <?php
        include('navigation.php');
        ?>

<div class="content-body"> 
    <div class="container-fluid">



            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">

                                    <h2>Schedule a Surgery with a Doctor</h2> <br>
                                    <label for="patientType">Is this a new or existing patient?</label><br>
                                    <select id="patientType" onchange="handlePatientTypeChange()" class="form-control">
                                        <option value="select">Select an option</option>
                                        <option value="new">New Patient</option>
                                        <option value="existing">Existing Patient</option>
                                    </select><br>

                                <div id="existingPatientForm" style="display:none;">
                                    <form action="insert_surgery.php" method="post"> 
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Patient:</label>
                                                <select name="patient_id" class="form-control">
                                                    <?php include('populate_patients.php'); ?>
                                                </select><br>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Doctor</label>
                                                <select name="surgeon_number" class="form-control">
                                                    <?php include('fetch_Surgeons.php'); ?>
                                                </select><br>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Date and Time:</label>
                                                <input type="datetime-local" class="form-control" name="appointment_datetime"><br>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Operating Room</label>
                                                <input type="Text" class="form-control" name="surgeryRoom"></textarea><br>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Surgery Type:</label>
                                                <select id="surgeryID" name="surgeryType" class="form-control">
                                                <?php
                                                    include('session.php');

                                                    $sql = "SELECT DISTINCT SkillCode, Description FROM SurgerySkill";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<option value='" . $row['SkillCode'] . "'>" . $row['Description'] . "</option>";
                                                        }
                                                    }
                                                    $conn->close();
                                                    ?>
                                                </select><br>
                                            </div>

                                        </div>
                                        
                                        <div class="row justify-content-between">
                
                                            <div class="col-3"> </div>
                                            <div class="col-3">    
                                                <button class="btn btn-success btn" type="submit" class="btn btn-dark" value="Schedule Appointment">Schedule Appointment</button> 
                                                <p></p>
                                                <a href="index.php"><button type="button" class="btn mb-1 btn-primary">Return to Home Page</button></a>

                                            </div>
                                        </div>
                                      

            
                                    </form>

                            
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


