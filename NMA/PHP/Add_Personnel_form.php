<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>Add Personnel</title>
    <script>
        function updateFormFields() {
            var role = document.getElementById('role').value;
            document.getElementById('specialtyField').style.display = (role === 'Physician') ? 'block' : 'none';
            document.getElementById('contractFields').style.display = (role === 'Surgeon') ? 'block' : 'none';
            document.getElementById('nurseFields').style.display = (role === 'Nurse') ? 'block' : 'none';
        }
    </script>
</head>
<body onload="updateFormFields()">
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
        <!--  <h2>Add New Personnel</h2>
            <form action="insert_personnel.php" method="post">

                <label for="role">Role:</label>
                <select id="role" name="role" onchange="updateFormFields()">
                    <option value="Physician">Physician</option>
                    <option value="Nurse">Nurse</option>
                    <option value="Surgeon">Surgeon</option>
                    <option value="Support Staff">Support Staff</option>
                </select><br>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select><br>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required><br>

                <label for="telephone">Telephone Number:</label>
                <input type="text" id="telephone" name="telephone" required><br>

                <label for="salary">Salary:</label>
                <input type="number" id="salary" name="salary"><br>

                <div id="specialtyField" style="display:none;">
                    <label for="specialty">Specialty:</label>
                    <input type="text" id="specialty" name="specialty"><br>
                </div>

                <div id="contractFields" style="display:none;">
                    <label for="contractType">Contract Type:</label>
                    <input type="text" id="contractType" name="contractType"><br>

                    <label for="contractLength">Contract Length (Years):</label>
                    <input type="number" id="contractLength" name="contractLength"><br>
                </div>

                <div id="nurseFields" style="display:none;">
                    <label for="grade">Grade:</label>
                    <input type="text" id="grade" name="grade"><br>

                    <label for="yearsExperience">Years of Experience:</label>
                    <input type="number" id="yearsExperience" name="yearsExperience"><br>
                </div>

                <input type="submit" value="Add Personnel">
            </form>
            <a href="Personnel.php"><button>Return to View Staff Page</button></a>
            <a href="index.php"><button>Return to Home Page</button></a>
            </div> -->





            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Add New Personnel</h4>
                        <div class="basic-form">
                            <form action="insert_personnel.php" method="post"> 
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="role" >Role:</label>
                                        <select id="role" name="role" onchange="updateFormFields()" class="form-control">
                                            <option value="Physician">Physician</option>
                                            <option value="Nurse">Nurse</option>
                                            <option value="Surgeon">Surgeon</option>
                                            <option value="Support Staff">Support Staff</option>
                                    </select><br>
                                    </div>

                                </div>
                                <div class="form-group form-row">

                                <div class="form-group col-md-6">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" required><br>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="gender">Gender:</label>
                                        <select id="gender" name="gender" class="form-control">
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select><br>
                                    </div>

                                  
                                </div>
                                
                                <div class="form-row">

                                    <div class="form-group col-md-6" >
                                        <label for="address">Address:</label>
                                        <input type="text" class="form-control" id="address" name="address" required><br>

                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="telephone">Telephone Number:</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone" required><br>

                                    </div>
                                </div>   

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="salary">Salary:</label>
                                        <input type="number" class="form-control" id="salary" name="salary"><br>
                                    </div>
                            
                                </div>  

                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                            <div id="specialtyField" style="display:none;">
                                                <label for="specialty">Specialty:</label>
                                                <input type="text" class="form-control" id="specialty" name="specialty"><br>
                                            </div>
                                    </div>
                                </div>  

                                <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <div id="contractFields" style="display:none;">
                                                <label for="contractType">Contract Type:</label>
                                                <input type="text" class="form-control" id="contractType" name="contractType"><br>

                                                <label for="contractLength">Contract Length (Years):</label>
                                                <input type="number" class="form-control" id="contractLength" name="contractLength"><br>
                                            </div>
                                        </div>

                                    </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6" >
                                        <div id="nurseFields" style="display:none;">
                                            <label for="grade">Grade:</label>
                                            <input type="text" class="form-control" id="grade" name="grade"><br>

                                            <label for="yearsExperience">Years of Experience:</label>
                                            <input type="number" class="form-control" id="yearsExperience" name="yearsExperience"><br>
                                        </div>

                                    </div>
                                    
                                
                                </div>   
                        
                                <div class="row justify-content-between">
                
                                            <div class="col-3"> </div>
                                            <div class="col-3">    
                                                <button class="btn btn-success btn" type="submit" class="btn btn-dark" value="Add Personnel">Add Personnel</button>
                                        
                                            </div>
                                    </div>

                                    <div> <p></p></div>

                                <div class="row justify-content-between">
                
                                            <div class="col-3"> </div>
                                            <div class="col-3">    
                                                <a href="Personnel.php"><button type="button" class="btn mb-1 btn-primary">Return to View Staff</button></a>
                                                <a href="index.php"><button type="button" class="btn mb-1 btn-primary">Return to Home Page</button></a>
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
</body>
</html>

