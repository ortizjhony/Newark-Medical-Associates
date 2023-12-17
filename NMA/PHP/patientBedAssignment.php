

<?php
   include('session.php');
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
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
<div id="main-wrapper">
    
    <?php
        include('navigation.php');
        ?>

    <div class="content-body">
        <div class="basic-form container-fluid">
            

        
            

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Assign/Remove Patient to Room/Bed</h4>
                            <div class="basic-form">
                                <form action="process_patientBedAssignment.php" method="post"> 
                                    <div class="form-row">

                                    <div class="form-group col-6">

                                        <label for="patient">In-Patient:</label>
                                                <select name="patient_id" id="patient" onchange="fetchPatientAssignment()" class="form-control">
                                                    <?php include('populate_in_patients.php'); ?>
                                                </select><br>     

                                        <labelfor="bed">Room:</label>
                                                <select name="room_id" id="room_id" class="form-control">
                                                <?php include('populate_available_rooms.php'); ?>
                                                </select><br>

                                        <labelfor="bed">Bed:</label>
                                        <input type="text" name="bed_number" id="bed" class="form-control">

                                        <label for="action">Action:</label>
                                            <select name="action" id="action" class="form-control">
                                                <option value="assign">Assign</option>
                                                <option value="remove">Remove</option>
                                            </select><br>
                                        </div>
                                        
                                    </div>
                                   
                                    
                                    
                                        
                            
                                    
                                    <button class="btn btn-success btn" type="submit" class="btn btn-dark" value="Submit">Submit</button>


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

