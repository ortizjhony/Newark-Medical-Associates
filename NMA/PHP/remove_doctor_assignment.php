<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>Remove Doctor Assignments</title>


    </head>
<body>
<div id="main-wrapper">
    
    <?php
        include('navigation.php');
        ?>
  
  <div class="content-body">
    <div class="container-fluid">

      
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

            <div id="room-data">
                
                <?php
                    include('session.php');

                    // Fetch patients with assigned doctors
                    $sql = "SELECT p.PatientNumber, p.Name AS PatientName, d.Name AS DoctorName 
                            FROM Patient p 
                            INNER JOIN Personnel d ON p.PrimaryPhysician = d.EmploymentNumber 
                            WHERE d.Role = 'Physician' OR d.Role = 'Surgeon'";

                    $result = $conn->query($sql);

                    echo "<h2>Remove Doctor Assignment</h2>";
                    echo "<form action='process_doctor_remove_assignment.php' method='post'>";
                    echo "<table class='table table-striped table-bordered zero-configuration'><tr><th>Patient</th><th>Current Doctor</th><th><center>Action</center></th></tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['PatientName'] . "</td><td>" . $row['DoctorName'] . "</td>";
                        echo "<td><center><button type='submit' class='btn mb-1 btn-outline-warning' name='patient_id' value='" . $row['PatientNumber'] . "'>Remove</button></center></td></tr>";
                    }

                    echo "</table>";
                    echo "</form>";
                    $conn->close();
                    ?>
            </div>
            

            <div class="row justify-content-between">
                
                <div class="col-1"> </div>
                <div class="col-6">    
                    <a href="display_current_assignments.php"><button type="button" class="btn mb-1 btn-primary">Return to View In-Patient Doctor Assingments</button></a>
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
