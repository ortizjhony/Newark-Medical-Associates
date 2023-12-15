<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Newark Medical Associates</title>
   <style>
        .tab, .sub-tab {
            display: none;
        }
        /* Additional styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1, h2 {
            color: #333;
        }
        .tab {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
        }
        button {
            display: inline-block;
            background: #333;
            color: #fff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            margin-right: 5px;
            margin-top: 10px;
        }
        button:hover {
            background: #555;
        }
        .pdf-container {
            height: 500px;
        }
        .pdf-container iframe {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <h1>Welcome to Newark Medical Associates</h1>
    <p>Description of the database requirements...</p>

    <button onclick="showTab('appReq')">Application Requirements</button>
    <button onclick="showTab('patientMgmt')">Patient Management</button>
    <button onclick="showTab('inPatientMgmt')">Inpatient Management</button>
    <button onclick="showTab('staffMgmt')">Clinic Staff Management</button>

  <div id="appReq" class="tab">
        <h2>Database Requirements</h2>
        <div class="pdf-container">
            <iframe src="Database_design.pdf" style="width: 90%; height: 500px;" title="Database Design"></iframe>
        </div>
        <h2>ERD</h2>
        <div class="pdf-container">
            <iframe src="CS631 ERD DeJesus Ortiz.drawio.pdf" style="width: 90%; height: 500px;" title="Database Design"></iframe>

        </div>
        <h2>Application Requirements</h2>
        <div class="pdf-container">
            <iframe src="app_requirements.pdf" style="width: 90%; height: 500px;" title="Database Design"></iframe>
        </div>
    </div>

    <div id="patientMgmt" class="tab">
        <h2>Patient Management</h2>
        <button onclick="window.location.href='add_patient_form.php'">Insert a New Patient</button>
        <button onclick="window.location.href='view_patient_info.php'">View Patient Information</button>
        <button onclick="window.location.href='schedule_appointment_form.php'">Schedule an Appointment with a Doctor</button>
        <button onclick="window.location.href='checkDiagnoses.php'">Check Previous Diagnoses and Illnesses</button>
        <button onclick="window.location.href='view_schedule.php'">View Schedule per Doctor and per Day</button>
    </div>

    <div id="inPatientMgmt" class="tab">
        <h2>Inpatient Management</h2>
        <button onclick="window.location.href='Patient_Personnel_Assignments.php'">Patient/Personnel Assignments</button>
        <button onclick="window.location.href='view_schedule_surgery.php'">View Surgery Schedule</button>
        <button onclick="window.location.href='schedule_surgery_form.php'">Book Surgery</button>
    </div>

    <div id="staffMgmt" class="tab">
        <h2>Clinic Staff Management</h2>
        <button onclick="window.location.href='Personnel.php'">Personnel Management</button>
    </div>

    <script>
        function showTab(tabName) {
            var tabs = document.getElementsByClassName('tab');
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].style.display = 'none';
            }
            document.getElementById(tabName).style.display = 'block';
        }

        function showSubTab(tabName) {
            var subTabs = document.getElementsByClassName('sub-tab');
            for (var i = 0; i < subTabs.length; i++) {
                subTabs[i].style.display = 'none';
            }
            document.getElementById(tabName).style.display = 'block';
        }
    </script>
</body>
</html>
