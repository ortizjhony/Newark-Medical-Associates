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
        <h2>Database Design Requirements</h2>
        <p>
            The Newark Medical Associates clinic database is designed for comprehensive clinic management, including surgeries, patient data, medications, and employee details. It encompasses tables for personnel, surgery skills, medications, patients, consultations, and more. This design facilitates tracking surgery types, recording patient illnesses and allergies, and managing staff shifts, ensuring efficient clinic operation.
        </p>
    </div>

    <div id="patientMgmt" class="tab">
        <h2>Patient Management</h2>
        <button onclick="window.location.href='add_patient_form.php'">Insert a New Patient</button>
        <button onclick="window.location.href='view_patient_info.php'">View Patient Information</button>
        <button onclick="showSubTab('scheduleAppointment')">Schedule an Appointment with a Doctor</button>
        <button onclick="showSubTab('checkDiagnoses')">Check Previous Diagnoses and Illnesses</button>
        <button onclick="showSubTab('viewSchedule')">View Schedule per Doctor and per Day</button>


        <div id="viewPatientInfo" class="sub-tab">
            <!-- View patient information form -->
        </div>

        <div id="scheduleAppointment" class="sub-tab">
            <!-- Schedule an appointment form -->
        </div>

        <div id="checkDiagnoses" class="sub-tab">
            <!-- Check previous diagnoses form -->
        </div>

        <div id="viewSchedule" class="sub-tab">
            <!-- View schedule per doctor and day form -->
        </div>
    </div>

    <div id="inPatientMgmt" class="tab">
        <h2>Inpatient Management</h2>
        <p>Details about inpatient management features...</p>
    </div>

    <div id="staffMgmt" class="tab">
        <h2>Clinic Staff Management</h2>
        <p>Details about staff management features...</p>
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
