<?php
   include('session.php');
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Newark Medical Associates</title>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">


<style>
        .tab, .sub-tab {
            display: none;
        }
       /* Additional styles 
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
        }*/
    </style>


</head>

<body>
 <div id="main-wrapper">
    
  <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.php">
                    <b class="logo-abbr"><img src="/NMA/images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="/NMA/images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="/NMA/images/logo-text.png"  height="55px" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->


  
   <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                  
                        <li class="nav-label"> Dashboard</li>

                        <li>
                            <a href="#" onclick="showTab('appReq')" aria-expanded="false">
                                <i class="icon-speedometer menu-icon"></i><span class="nav-text">Appliation Requirements</span>
                            </a>
                        
                        </li>
                        <li>
                           
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-speedometer menu-icon"></i><span class="nav-text">Patient Management</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="#" onclick="window.location.href='add_patient_form.php'">Insert a New Patient</a></li>
                                <li><a href="#" onclick="window.location.href='view_patient_info.php'">View Patient Information</a><li>
                                <li><a href="#" onclick="window.location.href='schedule_appointment_form.php'">Schedule an Appointment with a Doctor</a></li>
                                <li><a href="#" onclick="window.location.href='checkDiagnoses.php'">Check Previous Diagnoses and Illnesses</a></li>
                                <li><a href="#" onclick="window.location.href='view_schedule.php'">View Schedule</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-speedometer menu-icon"></i><span class="nav-text">In-Patient Management</span>
                            </a>
                            <ul aria-expanded="false">
                               <!-- <li><a href="#" onclick="window.location.href='Patient_Personnel_Assignments.php'">Patient/Personnel Assignments</a></li>-->

                             
                                <li><a href="#" onclick="window.location.href='available_rooms.php'">View Room/Bed Schedule</a></li>
                                <li><a href="#" onclick="showTab('Assignments')">Patient/Doctor/Nurse Management</a></li>       
                                    <ul aria-expanded="false"> 
                                        <li><a href="#" onclick="window.location.href='patientBedAssignment.php'">Assign/Remove a Patient to a Room/Bed</a></li>
                                        <li><a href="#" onclick="window.location.href='display_current_assignments.php'">Assign/Remove a Doctor to a Patient</a></li> 
                                        <li><a href="#" onclick="window.location.href='display_current_nurse_assignments.php'">Assign/Remove a Nurse to a Patient</a></li> 

                                    </ul>

                                <li><a href="#" onclick="window.location.href='view_schedule_surgery.php'">View Surgery Schedule</a></li>
                                <li><a href="#" onclick="window.location.href='schedule_surgery_form.php'">Book Surgery</a></li>         
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-speedometer menu-icon"></i><span class="nav-text">Clinic Managment</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="#" onclick="window.location.href='Personnel.php'">Personnel Management</a></li>
                            </ul>
                        </li>
                    </li>
                   
                </ul>
            </div>
        </div>
        <!--**********************************End side bar -->

 
    <div class="content-body">
        
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
