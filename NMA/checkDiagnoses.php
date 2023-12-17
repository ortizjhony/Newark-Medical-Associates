<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>View Previous Diagnoses and Illnesses</title>
        <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            margin-bottom: 30px; /* Adds space between tables */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table-title {
            text-align: left;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
        button {
            margin-top: 20px;
            display: block;
            width: 200px;
            padding: 10px;
            font-size: 16px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <!-- Optional: Include CSS for styling -->
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
    <div class="container-fluid">
        <div class="content-body">
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h1>Patient Diagnoses and Illnesses</h1><br>
                                <div id="patient-data">
                                    <div class="table-title">Illnesses</div> <br>
                                    <?php include('get_patient_Illnesses.php'); ?>
                                    <div class="table-title">Allergies</div><br>
                                    <?php include('get_patient_Allergies.php'); ?>
                                </div>
                                <div class="row justify-content-between">
                
                                    <div class="col-3"> </div>
                                    <div class="col-3">    
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
</div>


<script src="/NMA/bootstrap-theme/theme/plugins/common/common.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/custom.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/settings.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/gleek.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/styleSwitcher.js"></script>
</body>
</html>
