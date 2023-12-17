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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Job Shift</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
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
            <button type="submit" class="btn btn-primary">Schedule</button>
            <a href="Personnel_Schedule.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
