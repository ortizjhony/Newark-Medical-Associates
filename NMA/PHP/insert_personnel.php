<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>Success</title>


    </head>
<body>
<div id="main-wrapper">
    
    <?php
        include('navigation.php');
        ?>
  
  <div class="content-body">
    <div class="container-fluid">

      
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

            <div id="room-data">
                
            <?php
                include('session.php');

                ini_set('display_errors', 1);
                error_reporting(E_ALL);

                // Check if form is submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Retrieve form data
                    $role = $_POST['role'];
                    $name = $_POST['name'];
                    $gender = $_POST['gender'];
                    $address = $_POST['address'];
                    $telephone = $_POST['telephone'];
                    $salary = $_POST['salary'];
                    $specialty = isset($_POST['specialty']) ? $_POST['specialty'] : null;
                    $contractType = isset($_POST['contractType']) ? $_POST['contractType'] : null;
                    //$contractLength = (empty($_POST['contractLength'])) ? NULL : $_POST['yearsExperience'];
                    $contractLength = (empty($_POST['contractLength'])) ? NULL : (int)$_POST['contractLength'];
                    $grade = (empty($_POST['grade'])) ? NULL : $_POST['grade'];
                    $yearsExperience = (empty($_POST['yearsExperience'])) ? NULL : $_POST['yearsExperience'];


                    // Prepare SQL query based on role
                    $sql = "INSERT INTO Personnel (Name, Gender, Address, TelephoneNumber, Salary, Role, Specialty, ContractType, ContractLength, Grade, YearsExperience) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);

                    if ($stmt === false) {
                        die("Error preparing SQL statement: " . $conn->error);
                    }

                    // Bind parameters and execute
                    $stmt->bind_param("ssssdssiiii", $name, $gender, $address, $telephoneNumber, $salary, $role, $specialty, $contractType, $contractLength, $grade, $yearsExperience);


                    if ($stmt->execute()) {
                        echo "<p>New personnel added successfully</p>";
                    } else {
                        echo "<p>Error: " . $stmt->error . "</p>";
                    }

                    $stmt->close();
                }

      
                $conn->close();

                ?>
            </div>
            

            <div class="row justify-content-between">
                
                <div class="col-1"> </div>
                <div class="col-6">    
                    <a href="add_personnel_form.php"><button type="button" class="btn mb-1 btn-primary">Add Another Personnel</button></a>
                    <a href="index.php"><button type="button" class="btn mb-1 btn-primary">Return to Home Page</button></a>
                </div>
            </div>
                                </div>
                        </div>
                    </div>
            </div>
        


        </div>
    </div>
</div>



<script src="/NMA/bootstrap-theme/theme/plugins/common/common.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/custom.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/settings.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/gleek.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/styleSwitcher.js"></script>

</body>
</html>



