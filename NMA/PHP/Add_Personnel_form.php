<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>Add Personnel</title>
    <script>
        function updateFormFields() {
            var role = document.getElementById('role').value;
            document.getElementById('specialtyField').style.display = (role === 'Physician') ? 'block' : 'none';
            document.getElementById('contractFields').style.display = (role === 'Surgeon') ? 'block' : 'none';
            document.getElementById('nurseFields').style.display = (role === 'Nurse') ? 'block' : 'none';
        }
    </script>
</head>
<body onload="updateFormFields()">
    <h2>Add New Personnel</h2>
    <form action="insert_personnel.php" method="post">

        <label for="role">Role:</label>
        <select id="role" name="role" onchange="updateFormFields()">
            <option value="Physician">Physician</option>
            <option value="Nurse">Nurse</option>
            <option value="Surgeon">Surgeon</option>
            <option value="Support Staff">Support Staff</option>
        </select><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>

        <label for="telephone">Telephone Number:</label>
        <input type="text" id="telephone" name="telephone" required><br>

        <label for="salary">Salary:</label>
        <input type="number" id="salary" name="salary"><br>

        <div id="specialtyField" style="display:none;">
            <label for="specialty">Specialty:</label>
            <input type="text" id="specialty" name="specialty"><br>
        </div>

        <div id="contractFields" style="display:none;">
            <label for="contractType">Contract Type:</label>
            <input type="text" id="contractType" name="contractType"><br>

            <label for="contractLength">Contract Length (Years):</label>
            <input type="number" id="contractLength" name="contractLength"><br>
        </div>

        <div id="nurseFields" style="display:none;">
            <label for="grade">Grade:</label>
            <input type="text" id="grade" name="grade"><br>

            <label for="yearsExperience">Years of Experience:</label>
            <input type="number" id="yearsExperience" name="yearsExperience"><br>
        </div>

        <input type="submit" value="Add Personnel">
    </form>
    <a href="Personnel.php"><button>Return to View Staff Page</button></a>
    <a href="index.php"><button>Return to Home Page</button></a>
</body>
</html>

