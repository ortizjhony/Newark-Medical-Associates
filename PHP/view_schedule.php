<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Doctor's Schedule</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function fetchDates() {
            var doctorId = document.getElementById('doctor').value;
            $.post('fetch_dates.php', { doctor_id: doctorId }, function(data) {
                var dates = JSON.parse(data);
                var dateSelect = document.getElementById('date');
                dateSelect.innerHTML = '';
                dates.forEach(function(date) {
                    var option = document.createElement('option');
                    option.value = date;
                    option.text = date;
                    dateSelect.appendChild(option);
                });
            });
        }
    </script>
</head>
<body>
    <h2>View Schedule Per Doctor Per Day</h2>
    <form action="show_schedule.php" method="post">
        <label for="doctor">Choose a Doctor:</label>
        <select name="doctor_id" id="doctor" onchange="fetchDates()">
            <?php include('populate_doctors2.php'); ?>
        </select><br><br>

        <label for="date">Select Date:</label>
        <select id="date" name="schedule_date"></select><br><br>

        <input type="submit" value="View Schedule">
    </form>
    <a href="index.php"><button>Return to Home Page</button></a>
</body>
</html>

