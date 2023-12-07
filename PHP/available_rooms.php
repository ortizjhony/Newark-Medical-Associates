<?php
   include('session.php');
?>


<!DOCTYPE html>
<html>
<head>
    <title>Check Available Rooms and Beds</title>
    <!-- You can add CSS here to style your page -->
</head>
<body>
    <h2>Available Rooms and Beds</h2>
    <div id="room-data">
        <?php include('fetch_available_rooms.php'); ?>
    </div>
    <a href="Patient_Personnel_Assignments.php"><button>Return to In-Patient Management</button></a>
    <a href="index.php"><button>Return to Home Page</button></a>
</body>
</html>
