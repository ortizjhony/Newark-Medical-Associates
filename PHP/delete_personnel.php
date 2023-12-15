<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Choose Personnel To Remove</title>
        <script>
        function handlePatientTypeChange() {
            var personnelID = document.getElementById("personnelID").value;
                    }
    </script>
</head>
<body>
    <h2>Delete Personnel</h2>
    <div id="personnelID">
        <form action="process_delete_personnel.php" method="post">
            <label for="id">Select Employee To Delete:</label>
            <select name="id" id="id">
                <?php include('populate_personnel.php'); ?>
            </select><br>
            <input type="submit" value="Delete">
        </form>
    </div>
</body>

<a href="index.php"><button>Return to Home Page</button></a>
</html>
