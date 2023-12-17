<?php
include('session.php');

// Fetch patients without assigned doctors
$sqlPatients = "SELECT PatientNumber, Name FROM Patient WHERE PrimaryPhysician IS NULL";
$resultPatients = $conn->query($sqlPatients);

// Fetch all doctors
$sqlDoctors = "SELECT EmploymentNumber, Name FROM Personnel WHERE Role = 'Physician' OR Role = 'Surgeon'";
$resultDoctors = $conn->query($sqlDoctors);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>Assign Doctor to Patient</title>
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

                                <h2>Assign Doctor to Patient</h2> <br>
                                    

                                <form action="process_assign_doctor.php" method="post"> 
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="patient">Select Patient</label><br>
                                            <select name="patient_id" id="patient" class="form-control">
                                            <?php 
                                                if ($resultPatients->num_rows > 0) {
                                                    while($row = $resultPatients->fetch_assoc()) {
                                                        echo "<option value='" . $row['PatientNumber'] . "'>" . $row['Name'] . "</option>";
                                                    }
                                                } else {
                                                    echo "<option>No patients found</option>";
                                                }
                                                ?>
                                            </select><br>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="doctor">Doctor</label>
                                            <select name="doctor_id" id="doctor" class="form-control">
                                                <?php 
                                                    if ($resultDoctors->num_rows > 0) {
                                                        while($row = $resultDoctors->fetch_assoc()) {
                                                            echo "<option value='" . $row['EmploymentNumber'] . "'>" . $row['Name'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "<option>No doctors found</option>";
                                                    }
                                                ?>
                                            </select><br>
                                        </div>
                                    </div>

                                
                                    
                                    <div class="row justify-content-between">
            
                                        <div class="col-3"> </div>
                                        <div class="col-3">    
                                            <button class="btn btn-success btn" type="submit" class="btn btn-dark" value="Assign Doctor">Assign Doctor</button>
                                            <a href="display_current_assignments.php"><button type="button" class="btn mb-1 btn-primary">Return to Current Assignments</button></a>
                                        </div>
                                    </div>
                                    

        
                                </form>
                                
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

