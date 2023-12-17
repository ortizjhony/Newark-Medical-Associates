<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>View Surgeries</title>


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

            <div id="room-data">
                
            <?php
                include('session.php');

                // Initialize variables for filter criteria
                $surgeryRoom = $_POST['surgeryRoom'] ?? '';
                $surgeryDate = $_POST['surgeryDates'] ?? '';
                $surgeon = $_POST['surgeon'] ?? '';
                $patient = $_POST['patient'] ?? '';

                // Base query
                $sql = "SELECT s.OperationTheatre ,sc.Description, p.Name AS 'PatientName', pe.Name AS 'SurgeonName', DATE_FORMAT(SurgeryDateTime, '%Y-%m-%d') AS 'SurgeryDate'
                        FROM SurgerySchedule s
                        INNER JOIN SurgerySkill sc on s.SurgeryCode = sc.SkillCode
                        INNER JOIN Patient p on p.PatientNumber = s.Patient
                        INNER JOIN Personnel pe on s.Surgeon = pe.EmploymentNumber
                        WHERE ";

                // Array to hold individual conditions
                $conditions = [];

                // Append conditions based on selected filters
                if (!empty($surgeryRoom)) {
                    $conditions[] = "OperationTheatre = '$surgeryRoom'";
                }
                if (!empty($surgeryDate)) {
                    $conditions[] = "DATE_FORMAT(SurgeryDateTime, '%Y-%m-%d') = '$surgeryDate'";
                }
                if (!empty($surgeon)) {
                    $conditions[] = "Surgeon = '$surgeon'";
                }
                if (!empty($patient)) {
                    $conditions[] = "Patient = '$patient'";
                }

                // Combine conditions with AND
                $sql .= implode(' AND ', $conditions);

                // If no filter is selected, remove the WHERE clause
                if (empty($conditions)) {
                    $sql = "SELECT s.OperationTheatre ,sc.Description, p.Name AS 'PatientName', pe.Name AS 'SurgeonName', DATE_FORMAT(SurgeryDateTime, '%Y-%m-%d') AS 'SurgeryDate'
                            FROM SurgerySchedule s
                            INNER JOIN SurgerySkill sc on s.SurgeryCode = sc.SkillCode
                            INNER JOIN Patient p on p.PatientNumber = s.Patient
                            INNER JOIN Personnel pe on s.Surgeon = pe.EmploymentNumber";
                }

                // Execute the query
                $result = $conn->query($sql);

                echo "<h2>Surgery Schedule</h2>";
                echo "<p>Filter Conditions:</p>";
                echo "<ul>";
                echo "<li>Surgery Room: " . htmlspecialchars($surgeryRoom) . "</li>";
                echo "<li>Surgery Date: " . htmlspecialchars($surgeryDate) . "</li>";
                echo "<li>Surgeon ID: " . htmlspecialchars($surgeon) . "</li>";
                echo "<li>Patient ID: " . htmlspecialchars($patient) . "</li>";
                echo "</ul>";

                echo "<h2>Surgery Schedule</h2>";
                echo "<table class='table table-striped table-bordered zero-configuration'><tr><th>Description</th><th>OperationTheatre</th><th>SurgeryDate</th><th>SurgeonName</th><th>PatientName</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row['Description'] . "</td><td>" . $row['OperationTheatre'] . "</td><td>" . $row['SurgeryDate'] . "</td><td>" . $row['SurgeonName'] . "</td><td>" . $row['PatientName'] . "</td></tr>";
                }

                echo "</table>";


                $conn->close();

                ?>
            </div>
            

            <div class="row justify-content-between">
                
                <div class="col-1"> </div>
                <div class="col-3">    
                    <a href="view_schedule_surgery.php"><button type="button" class="btn mb-1 btn-primary">Return to View Schedule</button></a>
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



<script src="/NMA/bootstrap-theme/theme/plugins/common/common.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/custom.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/settings.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/gleek.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/styleSwitcher.js"></script>

</body>
</html>
