<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>In Patient Management</title>
    <style>
        .tab, .sub-tab {
            display: none;
        }
    </style>
</head>
<body>
    <h1>In-Patient Management</h1>
    <p>Description of the database requirements...</p>

    <button onclick="window.location.href='available_rooms.php'">Check for Available Room/Bed</button>
    <button onclick="showTab('Assignments')">Patient/Doctor/Nurse Management</button>
    <button onclick="window.location.href='index.php'">Return to HomePage</button>


    <div id="Assignments" class="tab">
        <h2>Patient/Doctor/Nurse Management</h2>
        <button onclick="window.location.href='patientBedAssignment.php'">Assign/Remove a Patient to a Room/Bed</button>
        <button onclick="window.location.href='display_current_assignments.php'">Assign/Remove a Doctor to a Patient</button>
        <button onclick="window.location.href='display_current_nurse_assignments.php'">Assign/Remove a Nurse to a Patient</button>
        <button onclick="window.location.href='index.php'">Return to HomePage</button>
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
