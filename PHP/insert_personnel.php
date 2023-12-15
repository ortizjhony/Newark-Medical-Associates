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
        echo "New personnel added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

echo "<a href='delete_personnel.php'><button>Delete Personnel</button></a>";
echo "<a href='add_personnel_form.php'><button>Add Another Personnel</button></a>";
echo "<a href='index.php'><button>Return to Home Page</button></a>";

$conn->close();

?>


