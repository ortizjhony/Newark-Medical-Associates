<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <link href="./plugins/sweetalert/css/sweetalert.css" rel="stylesheet">


    <title>Add New Patient</title>
    <script>
        function validateForm() {
            var ssn = document.forms["patientForm"]["ssn"].value;
            var dob = document.forms["patientForm"]["dob"].value;
            var gender = document.forms["patientForm"]["gender"].value.toUpperCase();
            var tel = document.forms["patientForm"]["tel"].value;
            var bloodType = document.forms["patientForm"]["blood_type"].value.toUpperCase();
            var validBloodTypes = ['A', 'AB', 'B', 'O', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
            var ssnPattern = /^[0-9]{3}-[0-9]{2}-[0-9]{4}$/;
            var telPattern = /^[0-9]{3}-[0-9]{4}$/;

            if (!ssnPattern.test(ssn)) {
                alert("Invalid SSN format. Format should be XXX-XX-XXXX with numbers only.");
                return false;
            }
            if (isNaN(Date.parse(dob))) {
                alert("Invalid Date of Birth.");
                return false;
            }
            if (gender !== 'M' && gender !== 'F') {
                alert("For this DEMO Gender must be either 'M' or 'F'.");
                return false;
            }
            if (!telPattern.test(tel)) {
                alert("Invalid telephone number format. Format should be XXX-XXXX.");
                return false;
            }
            if (!validBloodTypes.includes(bloodType)) {
                alert("Invalid Blood Type. Enter one of the following: A, B, AB, O, A+, A-, B+, B-, AB+, AB-, O+, O-.");
                return false;
            }
            return true; // Form is valid
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

     <!--   <form name="patientForm" action="insert_patient.php" method="post" onsubmit="return validateForm()">
                Name: <input type="text" name="name"><br>
                Gender: <input type="text" name="gender"><br>
                Date of Birth: <input type="date" name="dob"><br>
                Address: <input type="text" name="address"><br>
                Telephone Number: <input type="text" name="tel"><br>
                Social Security Number: <input type="text" name="ssn"><br>
                Primary Physician ID: <input type="number" name="physician_id"><br>
                Blood Type: <input type="text" name="blood_type"><br>
                <input type="submit" value="Add Patient">
            </form>-->


      

    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> Insert a New Patient</h4>
                                <div class="basic-form">
                                    <form name="patientForm" action="insert_patient.php" method="post" onsubmit="return validateForm()"> 
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control"><br>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Social Security Number</label>
                                                <input type="text" name="ssn" class="form-control"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control"><br>
                                        </div>
                                        
                                        <div class="form-row">

                                        <div class="form-group col-md-6" >
                                            <label>Date of Birth</label>
                                            <input type="date" name="dob" class="form-control"><br>
                                        </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label>Telephone</label>
                                                <input type="text" name="tel" class="form-control"><br>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Gender</label>
                                                <input type="text" name="gender" class="form-control"><br>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Blood Type</label>
                                                <input type="text" name="blood_type" class="form-control"><br>
                                            </div>
                                            
                                            <div class="form-group col-md-2">
                                                <label>Primary Physician ID:</label>
                                                <input type="number" name="physician_id" class="form-control"><br>
                                            </div>
                                        </div>
                                      
                                        <button class="btn btn-success btn" type="submit" class="btn btn-dark" value="Add Patient">Add Patient</button>

            
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


