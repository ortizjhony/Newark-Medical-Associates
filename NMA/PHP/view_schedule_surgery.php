<?php
include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>View Surgeries</title>
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

                                <h2>View Surgeries</h2> <br>
                                    

                                <form id="filterForm" method="post" action="process_filter.php"> 
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="surgeryRoom">Surgery Room</label><br>
                                            <select id="surgeryRoom" name="surgeryRoom" class="form-control">
                                                <option value="">Select Surgery Room (Optional)</option>
                                                <?php include('get_SurgeryRoom.php'); ?>
                                            </select><br>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="surgeryDates">Surgery Date</label>
                                            <select id="surgeryDates" name="surgeryDates" class="form-control">
                                                <option value="">Select Date (Optional)</option>
                
                                                <?php
                                                include('session.php');

                                                $sql = "SELECT DISTINCT DATE_FORMAT(SurgeryDateTime, '%Y-%m-%d') AS 'Dates' FROM SurgerySchedule ORDER BY SurgeryDateTime";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<option value='" . $row['Dates'] . "'>" . $row['Dates'] . "</option>";
                                                    }
                                                }
                                                $conn->close();
                                                ?>
                                            </select><br>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="surgeon">Surgeon</label>
                                            <select id="surgeon" name="surgeon" class="form-control">
                                                <option value="">Select Surgeon (Optional)</option>
                                                <?php include('populate_Surgeons.php'); ?>
                                            </select><br>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="patient">Patient</label>
                                            <select id="patient" name="patient" class="form-control">
                                                <option value="">Select Patient (Optional)</option>
                                                <?php include('populate_SurgeryPatients.php'); ?>
                                            </select><br>
                                        </div>
                                    </div>
                                
                                    
                                    <div class="row justify-content-between">
            
                                        <div class="col-3"> </div>
                                        <div class="col-3">    
                                            <button class="btn btn-success btn" type="submit" class="btn btn-dark" value="Filter">Filter</button>
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
<a href="index.php"><button>Return to Home Page</button></a>
</html>
