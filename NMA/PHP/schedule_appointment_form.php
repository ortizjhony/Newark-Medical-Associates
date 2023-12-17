<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include('session.php');
?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <link href="./plugins/sweetalert/css/sweetalert.css" rel="stylesheet">

    <title>Schedule an Appointment</title>
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


            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">

                                    <h2>Schedule an Appointment with a Doctor</h2> <br>
                                    <label for="patientType">Is this a new or existing patient?</label><br>
                                    <select id="patientType" onchange="handlePatientTypeChange()" class="form-control">
                                        <option value="select">Select an option</option>
                                        <option value="new">New Patient</option>
                                        <option value="existing">Existing Patient</option>
                                    </select><br>

                                <div id="existingPatientForm" style="display:none;">
                                    <form name="patientForm" action="insert_appointment.php" method="post"> 
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="patient_id">Patient:</label>
                                                <select name="patient_id" class="form-control">
                                                    <?php include('populate_patients.php'); ?>
                                                </select><br>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="physician_number">Doctor</label>
                                                <select name="physician_number" class="form-control">
                                                    <?php include('populate_doctors2.php'); ?>
                                                </select><br>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="appointment_datetime">Date and Time:</label>
                                                <input type="datetime-local" class="form-control" name="appointment_datetime"><br>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="notes">Notes</label>
                                                <textarea class="form-control" name="notes"></textarea><br>
                                            </div>
                                        </div>
                                        
                                        <div class="row justify-content-between">
                
                                            <div class="col-3"> </div>
                                            <div class="col-3">    
                                                <button class="btn btn-success btn" type="submit" class="btn btn-dark" value="Submit">Schedule Appointment</button>

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
    <script src="/NMA/bootstrap-theme/theme/plugins/common/common.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/custom.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/settings.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/gleek.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/styleSwitcher.js"></script>
    <script src="/NMA/bootstrap-theme/theme/plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/plugins/sweetalert/js/sweetalert.init.js"></script>
</body>
</html>