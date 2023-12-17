

<?php
   include('session.php');
?>


<!DOCTYPE html>
<html>
<head>
    <title>Assign/Remove Patient to Room/Bed</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function fetchPatientAssignment() {
            var patientId = document.getElementById('patient').value;
            $.post('check_patient_assignment.php', { patient_id: patientId }, function(data) {
                var assignment = JSON.parse(data);
                var roomSelect = document.getElementById('room');
                var bedSelect = document.getElementById('bed');
                var actionSelect = document.getElementById('action');

                bedSelect.innerHTML = ''; // Clear bed selection

                if (assignment.roomNumber && assignment.bedNumber) {
                    // Patient is currently assigned, so allow only 'Remove' option
                    roomSelect.innerHTML = `<option value='${assignment.roomNumber}'>${assignment.roomNumber} (Current Room)</option>`;
                    bedSelect.innerHTML = `<option value='${assignment.bedNumber}'>${assignment.bedNumber} (Current Bed)</option>`;
                    actionSelect.innerHTML = '<option value="remove">Remove</option>';
                } else {
                    // Patient is not assigned, so allow only 'Assign' option
                    actionSelect.innerHTML = '<option value="assign">Assign</option>';
                    fetchAvailableRoomsAndBeds(); // Fetch available rooms and beds
                }
            });
        }

        function fetchAvailableRoomsAndBeds() {
            $.get('populate_available_rooms.php', function(roomsData) {
                var rooms = JSON.parse(roomsData);
                var roomSelect = document.getElementById('room');
                roomSelect.innerHTML = '';

                rooms.forEach(function(room) {
                    var option = document.createElement('option');
                    option.value = room.roomNumber;
                    option.text = room.roomNumber;
                    roomSelect.appendChild(option);
                });

                if(rooms.length > 0) {
                    fetchAvailableBeds(rooms[0].roomNumber); // Fetch beds for the first available room
                }
            });
        }

        function fetchAvailableBeds(roomNumber) {
            $.get('populate_available_beds.php', { room_number: roomNumber }, function(bedsData) {
                var beds = JSON.parse(bedsData);
                var bedSelect = document.getElementById('bed');
                bedSelect.innerHTML = '';

                beds.forEach(function(bed) {
                    var option = document.createElement('option');
                    option.value = bed.bedNumber;
                    option.text = bed.bedNumber;
                    bedSelect.appendChild(option);
                });
            });
        }
    </script>
</head>
<body>
    <h2>Assign/Remove Patient to Room/Bed</h2>
    <form action="process_patientBedAssignment.php" method="post">
        <label for="patient">In-Patient:</label>
        <select name="patient_id" id="patient" onchange="fetchPatientAssignment()">
            <?php include('populate_in_patients.php'); ?>
        </select><br>

        <label for="room">Room:</label>
        <select name="room_id" id="room" onchange="fetchAvailableBeds(this.value)">
            <!-- Room options populated here -->
        </select><br>

        <label for="bed">Bed:</label>
        <select name="bed_number" id="bed">
            <!-- Bed options will be populated dynamically -->
        </select><br>

        <label for="action">Action:</label>
        <select name="action" id="action">
            <!-- Action options will be populated dynamically -->
        </select><br>

        <input type="submit" value="Submit">
    </form>
    <a href="Patient_Personnel_Assignments.php"><button>Return to In-Patient Management</button></a>
    <a href="index.php"><button>Return to Home Page</button></a>
</body>
</html>

