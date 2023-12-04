<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Patient Information</title>
    <!-- Optional: Include CSS for styling -->
</head>
<body>
    <h1>Patient Information</h1>
    <div id="patient-data">
        <?php include('get_patient_info.php'); ?>
    </div>
    <a href="index.php"><button>Return to Home Page</button></a>
</body>
</html>
