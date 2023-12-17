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

                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    $doctorId = $_POST['doctor_id'];
                                    $scheduleDate = $_POST['schedule_date'];
                                
                                    // Modify the query to include the doctor's name
                                    $sql = "SELECT c.ConsultationDateTime, p.Name AS PatientName, doc.Name AS DoctorName, c.Notes, c.ConsultationID
                                            FROM Consultation c
                                            INNER JOIN Patient p ON c.PatientNumber = p.PatientNumber
                                            INNER JOIN Personnel doc ON c.PhysicianNumber = doc.EmploymentNumber
                                            WHERE c.PhysicianNumber = ? AND DATE(c.ConsultationDateTime) = ?";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("is", $doctorId, $scheduleDate);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                
                                    $doctorName = "";
                                    if ($row = $result->fetch_assoc()) {
                                        // Fetch and store the doctor's name
                                        $doctorName = $row['DoctorName'];
                                
                                        // Start the table and print the first row
                                        echo "<h2>Schedule for Doctor: $doctorName on $scheduleDate</h2>";
                                        echo "<table class='table table-striped table-bordered zero-configuration'>";
                                        echo "<tr><th>Time</th><th>Patient Name</th><th>Reason for Consulation</th><th></th></tr>";
                                        echo "<tr>";
                                        echo "<td>" . $row["ConsultationDateTime"] . "</td>";
                                        echo "<td>" . $row["PatientName"] . "</td>";
                                        echo "<td>" . $row["Notes"] . "</td>";
                                        echo "<td><a href='consulation_details_form.php?consultation_id=" . $row["ConsultationID"] . "'><button type='button' class='btn mb-1 btn-outline-primary'>Enter Consulation</button></a></td>";
                                        echo "</tr>";
                                
                                        // Continue fetching the rest of the rows.
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["ConsultationDateTime"] . "</td>";
                                            echo "<td>" . $row["PatientName"] . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<h2>No appointments found for Doctor ID: $doctorId on $scheduleDate</h2>";
                                    }
                                
                                    if ($doctorName != "") {
                                        echo "</table>";
                                    }
                                
                                    $stmt->close();
                                } else {
                                    echo "Invalid request method.";
                                }
                                
                                $conn->close();

                               
                                ?>    

                                <div class="row justify-content-between">   
                                <div class="col-1"> </div>
                                <div class="col-6"> 
                                    <a href="view_schedule.php"><button type="button" class="btn mb-1 btn-primary">Return to View Schedule</button></a>
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