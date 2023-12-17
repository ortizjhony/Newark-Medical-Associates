 
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
                                        <li><a href="#" onclick="window.location.href='patientBedAssignment.php'">Assign/Remove a Patient's Room/Bed</a></li>
                                        <li><a href="#" onclick="window.location.href='display_current_assignments.php'">Assign/Remove a Doctor</a></li> 
                                        <li><a href="#" onclick="window.location.href='display_current_nurse_assignments.php'">Assign/Remove a Nurse</a></li> 

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
                                <li><a href="#" onclick="window.location.href='Personnel.php'"> View Personnel</a></li>
                                    <ul aria-expanded="false"> 
                                            <li><a href="#" onclick="window.location.href='Add_Personnel_form.php'">Add Personnel</a></li>
                                            <li><a href="#" onclick="window.location.href='delete_personnel.php'">Delete Personnel</a></li> 

                                        </ul>
                            </ul>
                        </li>
                    </li>
                   
                </ul>
            </div>
        </div>
        <!--**********************************End side bar -->