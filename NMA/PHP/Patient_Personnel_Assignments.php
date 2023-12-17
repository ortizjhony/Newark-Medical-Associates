<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>In Patient Management</title>
    <style>
        .tab, .sub-tab {
            display: none;
        }
    </style>
</head>
<body>

<div id="main-wrapper">
    
    <?php
        include('navigation.php');
        ?>
        
  <div class="content-body">
    <div class="container-fluid">
      

            <div class="card">
                 <div class="card-body">
                    <h1>In-Patient Management</h1>


                    <button  type="button" onclick="window.location.href='available_rooms.php'" class="btn mb-1 btn-primary">Check for Available Room/Bed</button>
                    <button  type="button" onclick="showTab('Assignments')" class="btn mb-1 btn-primary">Patient/Doctor/Nurse Management</button>
                    <button  type="button" onclick="window.location.href='index.php'" class="btn mb-1 btn-primary">Return to HomePage</button>


                    <div id="Assignments" class="tab">
                        <h2>Patient/Doctor/Nurse Management</h2>
                        <button  type="button" onclick="window.location.href='patientBedAssignment.php'"  class="btn mb-1 btn-primary">Assign/Remove a Patient to a Room/Bed</button>
                        <button  type="button" onclick="window.location.href='display_current_assignments.php'" class="btn mb-1 btn-primary">Assign/Remove a Doctor to a Patient</button>
                        <button  type="button" onclick="window.location.href='display_current_nurse_assignments.php'" class="btn mb-1 btn-primary">Assign/Remove a Nurse to a Patient</button>                    </div>
                </div>
            </div>
        </div>
    </div>
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

    <script src="/NMA/bootstrap-theme/theme/plugins/common/common.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/custom.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/settings.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/gleek.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/styleSwitcher.js"></script>
</body>
</html>
