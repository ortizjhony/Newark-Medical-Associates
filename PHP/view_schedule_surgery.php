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

    <!-- Filter Options -->
    <form id="filterForm">
        <label for="surgeryRoom">Surgery Room:</label>
        <select id="surgeryRoom" name="surgeryRoom">
            <!-- Populate with room options -->
            <?php include('get_SurgeryRoom.php'); ?>
        </select>

        <label for="date">Surgery Date:</label>
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
        </select>

        <label for="surgeon">Surgeon:</label>
        <select id="surgeon" name="surgeon">
            <!-- Populate with surgeon options -->
            <?php include('populate_Surgeons.php'); ?>
        </select>

        <label for="patient">Patient:</label>
        <select id="patient" name="patient">
            <!-- Populate with patient options -->
            <?php include('populate_SurgeryPatients.php'); ?>
        </select>

        <input type="submit" value="Filter">
    </form>

    <!-- Surgery Details Table -->
    <table id="surgeryDetails">
        <thead>
            <tr>
                <th>Surgery Name</th>
                <th>Surgery Room</th>
                <th>Date</th>
                <th>Surgeon Name</th>
                <th>Patient Name</th>
            </tr>
        </thead>
        <tbody>
            <!-- Surgery details will be populated here -->
        </tbody>
    </table>
</body>
</html>
