<?php
include('session.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employmentNumber = $_POST['employmentNumber'];
    $shiftDate = $_POST['shiftDate'];
    $shiftStart = $_POST['shiftStart'];
    $shiftEnd = $_POST['shiftEnd'];

    // Insert new job shift
    $sql = "INSERT INTO JobShift (EmploymentNumber, ShiftDate, ShiftStart, ShiftEnd) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $employmentNumber, $shiftDate, $shiftStart, $shiftEnd);

    if ($stmt->execute()) {
        // Redirect back to the Personnel_Schedule.php page
        header("Location: Personnel_Schedule.php");
        exit;
    } else {
        echo "Error scheduling job shift: " . $conn->error;
    }

    $conn->close();
}

// Check if employment number is set
if (!isset($_GET['employmentNumber'])) {
    echo "No employment number provided.";
    exit;
}

$employmentNumber = $_GET['employmentNumber'];
$employeeName = $_GET['employeeName'];
$employeeRole = $_GET['employeeRole'];
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <link href="./plugins/sweetalert/css/sweetalert.css" rel="stylesheet">


    <title>Schedule Job Shift</title>

</head>
<body>
<div id="main-wrapper">
    <?php
        include('navigation.php');
        ?>

    <div class="content-body">
        <div class="basic-form container-fluid">

      

    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <h2 class="card-title">Schedule Job Shift for Employee: <?php echo !empty($employeeName) ? htmlspecialchars($employeeName) : "Unknown"; ?> (<?php echo !empty($employeeRole) ? htmlspecialchars($employeeRole) : "Unknown Role"; ?>)</h2>

                                <div class="basic-form">
                                    <form method="POST"> 
                                       
                                    <h2>Schedule Job Shift for Employee: <?php echo !empty($employeeName) ? htmlspecialchars($employeeName) : "Unknown"; ?> (<?php echo !empty($employeeRole) ? htmlspecialchars($employeeRole) : "Unknown Role"; ?>)</h2>
                                    <form method="POST">
                                        <input type="hidden" name="employmentNumber" value="<?php echo $employmentNumber; ?>">
                                        <div class="form-group">
                                            <label for="shiftDate">Shift Date:</label>
                                            <input type="date" class="form-control" id="shiftDate" name="shiftDate" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="shiftStart">Shift Start Time:</label>
                                            <input type="time" class="form-control" id="shiftStart" name="shiftStart" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="shiftEnd">Shift End Time:</label>
                                            <input type="time" class="form-control" id="shiftEnd" name="shiftEnd" required>
                                        </div>
         
                                        <div class="row justify-content-between">   
                                                <div class="col-1"> </div>
                                                <div class="col-6"> 
                                                    <button type="submit" class="btn mb-1 btn-success">Schedule</button>
                                                    <a href="Personnel_Schedule.php"><button type="button" class="btn mb-1 btn-danger">Cancel</button></a>
                                                </div>
                                            </div>

                                    </form>

                                        
                                      
                                      
                                       
            
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
<!---- end -->

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


