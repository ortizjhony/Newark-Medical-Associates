


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>View Rooms and Bed</title>


    </head>
<body>
<div id="main-wrapper">
    
    <?php
        include('navigation.php');
        ?>
  
    <div class="container-fluid">
      <div class="content-body">
      
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

            <div id="room-data">
                
                    <?php
                    include('session.php');

                    $sql = "SELECT p.Name AS PatientName, d.Name AS DoctorName 
                            FROM InPatient i 
                            INNER JOIN Patient p ON i.PatientNumber = p.PatientNumber 
                            LEFT JOIN Personnel d ON p.PrimaryPhysician = d.EmploymentNumber 
                            WHERE d.Role = 'Physician' OR d.Role = 'Surgeon'";

                    $result = $conn->query($sql);

                    echo "<h2>Current In-Patient Doctor Assignments</h2>";
                    echo "<table class='table table-striped table-bordered zero-configuration'><tr><th>Patient</th><th>Assigned Doctor</th></tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['PatientName'] . "</td><td>" . $row['DoctorName'] . "</td></tr>";
                    }

                    echo "</table>";

                    $conn->close();
                    ?>
            </div>
            <div class="row">

                <div class="col">    
                    <a href='remove_doctor_assignment.php'><button type='button' class='btn mb-1 btn-primary'>Remove Doctor Assignment</button></a>
                    <a href='assign_doctor.php'><button type='button' class='btn mb-1 btn-primary'>Assign Doctor</button></a>
                    
                </div>
            </div>

            <div class="row justify-content-between">
                
                <div class="col-3"> </div>
                <div class="col-6">    
                    <a href="Patient_Personnel_Assignments.php"><button type="button" class="btn mb-1 btn-primary">Return to In-Patient Management</button></a>
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
