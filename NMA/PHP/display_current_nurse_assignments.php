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

<div class="content-body">
    <div class="container-fluid">

      
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

            <div id="room-data">
                
            <?php
                include('session.php');

                $sql = "SELECT p.Name AS PatientName, d.Name AS NurseName, d.Role
                        FROM InPatient i 
                        INNER JOIN Patient p ON i.PatientNumber = p.PatientNumber 
                        INNER JOIN Personnel d ON i.AttendingNurse = d.EmploymentNumber
                        WHERE d.Role = 'Nurse' ";

                $result = $conn->query($sql);

                echo "<h2>Current In-Patient Nurse Assignments</h2>";
                echo "<table class='table table-striped table-bordered zero-configuration'><tr><th>Patient</th><th>Assigned Nurse</th><th>Role</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row['PatientName'] . "</td><td>" . $row['NurseName'] . "</td><td>" . $row['Role'] . "</td></tr>";
                }

                echo "</table>";

                $conn->close();
                ?>
            </div>
            <div class="row">

                <div class="col">    
                    <a href='remove_nurse_assignment.php'><button type='button' class='btn mb-1 btn-primary'>Remove Nurse Assignment</button></a>
                    <a href='assign_nurse.php'><button type='button' class='btn mb-1 btn-primary'>Assign Nurse</button></a>
                    
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
