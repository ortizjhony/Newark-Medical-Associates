<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include('session.php');
?>


<!DOCTYPE html>
<html>
<head>
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
    <h2>Schedule an Appointment with a Doctor</h2>
    <label for="patientType">Is this a new or existing patient?</label><br>
    <select id="patientType" onchange="handlePatientTypeChange()">
        <option value="select">Select an option</option>
        <option value="new">New Patient</option>
        <option value="existing">Existing Patient</option>
    </select><br>

    <div id="existingPatientForm" style="display:none;">
        <form action="insert_appointment.php" method="post">
            Patient: 
            <select name="patient_id">
                <?php include('populate_patients.php'); ?>
            </select><br>
            Doctor: 
            <select name="physician_number">
                <?php include('populate_doctors2.php'); ?>
            </select><br>
            Date and Time: <input type="datetime-local" name="appointment_datetime"><br>
            Notes: <textarea name="notes"></textarea><br>
            <input type="submit" value="Schedule Appointment">
        </form>
    </div>
    <a href="index.php"><button>Return to Home Page</button></a>
</body>
</html>