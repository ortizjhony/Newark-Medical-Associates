<?php
include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Surgeries</title>
</head>
<body>
    <h1>View Surgeries</h1>
    <form id="filterForm" method="post" action="process_filter.php">
        <label for="surgeryRoom">Surgery Room:</label>
        <select id="surgeryRoom" name="surgeryRoom">
            <option value="">Select Surgery Room (Optional)</option>
            <?php include('get_SurgeryRoom.php'); ?>
        </select><br>

        <label for="surgeryDates">Surgery Date:</label>
        <select id="surgeryDates" name="surgeryDates">
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

        <label for="surgeon">Surgeon:</label>
        <select id="surgeon" name="surgeon">
            <option value="">Select Surgeon (Optional)</option>
            <?php include('populate_Surgeons.php'); ?>
        </select><br>

        <label for="patient">Patient:</label>
        <select id="patient" name="patient">
            <option value="">Select Patient (Optional)</option>
            <?php include('populate_SurgeryPatients.php'); ?>
        </select><br>

        <input type="submit" value="Filter">
    </form>
</body>
<a href="index.php"><button>Return to Home Page</button></a>
</html>
