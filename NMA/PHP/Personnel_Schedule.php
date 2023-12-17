<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>View Doctor Schedule</title>
    <!-- Optional: Include CSS for styling -->
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
                                

                            <?php
                                include('session.php');

                                ini_set('display_errors', 1);
                                error_reporting(E_ALL);

                                // Function to delete a job shift
                                function deleteJobShift($jobId, $conn) {
                                    $sql = "DELETE FROM JobShift WHERE JobShiftID = ?";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("i", $jobId);
                                    if ($stmt->execute()) {
                                        return true;
                                    } else {
                                        return false;
                                    }
                                }

                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    if (isset($_POST['action'])) {
                                        $jobId = $_POST['job_id'];

                                        // Handle "Remove" button click
                                        if ($_POST['action'] == 'remove') {
                                            if (deleteJobShift($jobId, $conn)) {
                                                echo "Job shift removed successfully.";
                                            } else {
                                                echo "Error removing job shift: " . $conn->error;
                                            }
                                        }
                                    }
                                }

                                // Prepare the SQL query to retrieve the schedule
                                $sql = "SELECT p.EmploymentNumber, p.Name, p.Role, j.JobShiftID, j.ShiftDate, DATE_FORMAT(ShiftStart, '%h:%i%p') AS ShiftStart, DATE_FORMAT(ShiftEnd, '%h:%i%p') AS ShiftEnd
                                        FROM Personnel p
                                        LEFT JOIN JobShift j ON j.EmploymentNumber = p.EmploymentNumber";

                                $result = $conn->query($sql);

                            
                                echo '<h2>Personnel Schedule</h2>';

                                // Check if there are any shifts for current scheduled personnel
                                if ($result->num_rows > 0) {
                                    echo '<table class="table table-striped table-bordered">';
                                    echo '<thead>';
                                    echo '<tr><th>Name</th><th>Job</th><th>Shift Date</th><th>Shift Start</th><th>Shift End</th><th>Action</th></tr>';
                                    echo '</thead>';
                                    echo '<tbody>';

                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td>' . $row['Name'] . '</td>';
                                        echo '<td>' . $row['Role'] . '</td>';
                                        echo '<td>' . $row['ShiftDate'] . '</td>';
                                        echo '<td>' . $row['ShiftStart'] . '</td>';
                                        echo '<td>' . $row['ShiftEnd'] . '</td>';

                                        if (!empty($row['ShiftDate'])) {
                                            echo '<td>';
                                            echo '<form method="POST">';
                                            echo '<input type="hidden" name="action" value="remove">';
                                            echo '<input type="hidden" name="job_id" value="' . $row['JobShiftID'] . '">';
                                            echo '<button type="submit" class="btn mb-1 btn-danger">Remove</button>';
                                            echo '</form>';
                                            echo '</td>';
                                        } else {
                                        // echo '<td><a href="schedule_personnel_form.php?employmentNumber=' . $row['EmploymentNumber'] . '" class="btn btn-success">Schedule</a></td>';
                                        echo '<td><a href="schedule_personnel_form.php?employmentNumber=' . urlencode($row['EmploymentNumber']) . '&employeeName=' . urlencode($row['Name']) . '&employeeRole=' . urlencode($row['Role']) . '" class="btn mb-1 btn-success">Schedule</a></td>';


                                        }

                                        echo '</tr>';
                                    }

                                    echo '</tbody>';
                                    echo '</table>';
                            
                                } else {
                                    echo 'No shifts found for current scheduled personnel.';
                                }


                                $conn->close();
                                ?>

                                <div class="row justify-content-between">   
                                <div class="col-1"> </div>
                                <div class="col-6"> 
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