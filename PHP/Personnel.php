<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Staff by Job Type</title>
        <script>
        function handlePatientTypeChange() {
            var personnelType = document.getElementById("personnelType").value;
                    }
    </script>
</head>
<body>
    <h2>View Staff Members</h2>
    <div id="personnelType">
        <form action="view_staff.php" method="post">
            <label for="jobType">Select Job Type:</label>
            <select name="jobType" id="jobType">
                <option value="">All Job Types</option>
                <?php include('populateJobType.php'); ?>
            </select><br>
            <input type="submit" value="View Staff">
        </form>
    </div>
</body>


<a href="Add_Personnel_form.php"><button>Add Personnel</button></a>
<a href='delete_personnel.php'><button>Delete Personnel</button></a>
<a href="index.php"><button>Return to Home Page</button></a>
</html>
