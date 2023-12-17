<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>View Doctor's Schedule</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function fetchDates() {
            var doctorId = document.getElementById('doctor').value;
            $.post('fetch_dates.php', { doctor_id: doctorId }, function(data) {
                var dates = JSON.parse(data);
                var dateSelect = document.getElementById('date');
                dateSelect.innerHTML = '';
                dates.forEach(function(date) {
                    var option = document.createElement('option');
                    option.value = date;
                    option.text = date;
                    dateSelect.appendChild(option);
                });
            });
        }
    </script>
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
        <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">

                                    <h2>View Schedule Per Doctor Per Day</h2> <br>
                                   

                
                                    <form name="showschedule" action="show_schedule.php" method="post"> 
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Choose a Doctor</label>
                                                <select name="doctor_id" id="doctor" onchange="fetchDates()" class="form-control">
                                                    <?php include('populate_doctors2.php'); ?>
                                                </select><br>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Select Date:</label>
                                                <select id="date" name="schedule_date" class="form-control"></select><br><br>
                                            </div>
                                        </div>

                                        
                                        <div class="row justify-content-between">
                
                                            <div class="col-3"> </div>
                                            <div class="col-3">    
                                                <button class="btn btn-success btn" type="submit" class="btn btn-dark" value="Submit">View Schedule</button>

                                            </div>
                                        </div>
                                      

            
                                    </form>
                                
                                 </div>
                            </div>
                        </div>
            </div>
    </div>
</div>
</body>
<script src="/NMA/bootstrap-theme/theme/plugins/common/common.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/custom.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/settings.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/gleek.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/styleSwitcher.js"></script>
</html>

