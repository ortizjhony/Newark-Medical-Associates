<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>View Staff</title>


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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jobType = $_POST['jobType'];

    switch ($jobType) {
        case 'Physician':
            $sql = "SELECT EmploymentNumber, Name, Gender, Address, TelephoneNumber, CONCAT('$', FORMAT(Salary, 2)) AS Salary, Role, Specialty FROM Personnel WHERE Role = 'Physician'";
            $result = $conn->query($sql);
            if (!$result) {
                echo "Error executing query: " . $conn->error;
            } else {
                // Display the results in a table
                // ...
                echo "<h2>$jobType</h2>";
                echo "<table class='table table-striped table-bordered zero-configuration'>";
                echo "<tr><th>Employee ID</th><th>EmployeeEmployee Name</th><th>Gender</th><th>Address</th><th>TelephoneNumber</th><th>Salary</th><th>Staff Role</th><th>Specialty</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['EmploymentNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['TelephoneNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Salary']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Role']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Specialty']) . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

            }
            break;
        case 'Surgeon':
            $sql = "SELECT EmploymentNumber, Name, Gender, Address, TelephoneNumber, Role, Specialty, ContractType, ContractLength FROM `Personnel` WHERE Role = 'Surgeon'";
            $result = $conn->query($sql);
            if (!$result) {
                echo "Error executing query: " . $conn->error;
            } else {
                // Display the results in a table
                // ...
                echo "<h2>$jobType</h2>";
                echo "<table class='table table-striped table-bordered zero-configuration'>";
                echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Gender</th><th>Address</th><th>TelephoneNumber</th><th>Staff Role</th><th>Specialty</th><th>Contract</th><th>Contract Years</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['EmploymentNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['TelephoneNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Role']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Specialty']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ContractType']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ContractLength']) . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

            }
            break;
        case 'Nurse':
           $sql = "SELECT EmploymentNumber , Name, Gender, Address, TelephoneNumber, CONCAT('$',FORMAT(Salary, 2)) AS Salary, Role, Grade, YearsExperience FROM `Personnel` WHERE Role = 'Nurse'";
            $result = $conn->query($sql);
            if (!$result) {
                echo "Error executing query: " . $conn->error;
            } else {
                // Display the results in a table
                // ...
                echo "<h2>$jobType</h2>";
                echo "<table class='table table-striped table-bordered zero-configuration'>";
                echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Gender</th><th>Address</th><th>TelephoneNumber</th><th>Salary</th><th>Staff Role</th><th>Grade</th><th>Years of Experience</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['EmploymentNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['TelephoneNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Salary']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Role']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Grade']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['YearsExperience']) . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

            }
            break;
        case 'Support Staff':
           $sql = "SELECT EmploymentNumber, Name, Gender, Address, TelephoneNumber, CONCAT('$',FORMAT(Salary, 2)) AS Salary, Role FROM `Personnel` WHERE Role = 'Support Staff'";
            $result = $conn->query($sql);
            if (!$result) {
                echo "Error executing query: " . $conn->error;
            } else {
                // Display the results in a table
                // ...
                echo "<h2>$jobType</h2>";
                echo "<table class='table table-striped table-bordered zero-configuration'>";
                echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Gender</th><th>Address</th><th>TelephoneNumber</th><th>Salary</th><th>Staff Role</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['EmploymentNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['TelephoneNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Salary']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Role']) . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

            }
            break;
        case 'Chief of Staff':
           $sql = "SELECT EmploymentNumber, Name, Gender, Address, TelephoneNumber, CONCAT('$',FORMAT(Salary, 2)) AS Salary, Role FROM `Personnel` WHERE Role = 'Chief of Staff'";
            $result = $conn->query($sql);
            if (!$result) {
                echo "Error executing query: " . $conn->error;
            } else {
                // Display the results in a table
                // ...
                echo "<h2>$jobType</h2>";
                echo "<table class='table table-striped table-bordered zero-configuration'>";
                echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Gender</th><th>Address</th><th>TelephoneNumber</th><th>Salary</th><th>Staff Role</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['EmploymentNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['TelephoneNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Salary']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Role']) . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

            }
            break;
        default:
            // code...

            $sql = "SELECT EmploymentNumber, Name, Gender, Address, TelephoneNumber, Role FROM `Personnel`";
            $result = $conn->query($sql);
            if (!$result) {
                echo "Error executing query: " . $conn->error;
            } else {
                // Display the results in a table
                // ...
                echo "<h2>All Personnel</h2>";
                echo "<table class='table table-striped table-bordered zero-configuration'>";
                echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Gender</th><th>Address</th><th>TelephoneNumber</th><th>Staff Role</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['EmploymentNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['TelephoneNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Role']) . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

            }           
            break;
    }
} else {
    echo "Invalid request method.";
}


$conn->close();

?>
            </div>
            

            <div class="row">
            <div class="col-6"> 
                    <a href="Add_Personnel_form.php"><button type="button" class="btn mb-1 btn-primary">Add Personnel</button></a>
                    <a href='delete_personnel.php'><button type="button" class="btn mb-1 btn-primary">Delete Personnel</button></a>

            </div>
                <div class="col-5">   
                    
                    <a href="Personnel.php"><button type="button" class="btn mb-1 btn-primary">Return to View Staff Page</button></a>
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
