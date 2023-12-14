<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
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
    <form name="patientForm" action="insert_patient.php" method="post" onsubmit="return validateForm()">
        Name: <input type="text" name="name"><br>
        Gender: <input type="text" name="gender"><br>
        Date of Birth: <input type="date" name="dob"><br>
        Address: <input type="text" name="address"><br>
        Telephone Number: <input type="text" name="tel"><br>
        Social Security Number: <input type="text" name="ssn"><br>
        Primary Physician ID: <input type="number" name="physician_id"><br>
        Blood Type: <input type="text" name="blood_type"><br>
        <input type="submit" value="Add Patient">
    </form>
</body>
</html>


