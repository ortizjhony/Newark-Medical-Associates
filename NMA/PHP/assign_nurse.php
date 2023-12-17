<?php
include('session.php');

// Fetch patients without assigned doctors
$sqlPatients = "SELECT i.PatientNumber, p.Name 
                FROM InPatient i
                INNER JOIN Patient p On i.PatientNumber = p.PatientNumber
                WHERE AttendingNurse IS NULL";
$resultPatients = $conn->query($sqlPatients);

// Fetch all doctors
$sqlNurse = "SELECT EmploymentNumber, Name FROM Personnel WHERE Role = 'Nurse'";
$resultNurses = $conn->query($sqlNurse);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>Assign Nurse to Patient</title>
</head>
<body>

<div id="main-wrapper">
    <?php
        include('navigation.php');
        ?>

    <div class="content-body">

        <div class="col-lg-12 container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">

                                 <h2>Assign Nurse to Patient</h2> <br>
                                    

                                <form action="process_assign_nurse.php" method="post"> 
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
                                            <label>Nurse</label>
                                            <select name="Nurse_id" id="nurse" class="form-control">
                                            <?php 
                                                if ($resultNurses->num_rows > 0) {
                                                    while($row = $resultNurses->fetch_assoc()) {
                                                        echo "<option value='" . $row['EmploymentNumber'] . "'>" . $row['Name'] . "</option>";
                                                    }
                                                } else {
                                                    echo "<option>No nurses found</option>";
                                                }
                                                ?>
                                            </select><br>
                                        </div>
                                    </div>

                                
                                    
                                    <div class="row justify-content-between">
            
                                        <div class="col-3"> </div>
                                        <div class="col-3">    
                                            <button class="btn btn-success btn" type="submit" class="btn btn-dark" value="Assign Nurse">Assign Nurse</button>
                                            <a href="display_current_nurse_assignments.php"><button type="button" class="btn mb-1 btn-primary">Return to Current Assignments</button></a>
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

