<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
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

<div id="main-wrapper">
    
    <?php
        include('navigation.php');
        ?>

    <div class="content-body">
        <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">

                                    <h2>View Schedule Per Doctor Per Day</h2> <br>
                                   

                
                                    <form name="showschedule" action="show_schedule.php" method="post"> 
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Choose a Doctor</label>
                                                <select name="doctor_id" id="doctor" onchange="fetchDates()" class="form-control">
                                                    <?php include('populate_doctors2.php'); ?>
                                                </select><br>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Select Date:</label>
                                                <select id="date" name="schedule_date" class="form-control"></select><br><br>
                                            </div>
                                        </div>

                                        
                                        <div class="row justify-content-between">
                
                                            <div class="col-3"> </div>
                                            <div class="col-3">    
                                                <button class="btn btn-success btn" type="submit" class="btn btn-dark" value="Submit">View Schedule</button>
                                            </div>
                                        </div>
                                      

            
                                    </form>
                                
                                 </div>
                            </div>
                        </div>
            </div>
    </div>
</div>
</body>
<script src="/NMA/bootstrap-theme/theme/plugins/common/common.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/custom.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/settings.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/gleek.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/styleSwitcher.js"></script>
</html>

