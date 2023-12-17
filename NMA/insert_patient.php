<?php
include('session.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);



// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Display the data for testing
//     echo "Name: " . $_POST['name'] . "<br>";
//     echo "Gender: " . $_POST['gender'] . "<br>";
//     echo "Date Of Birth: " . $_POST['dob'] . "<br>";
//     echo "Address: " . $_POST['address'] . "<br>";
//     echo "Telephone Number: " . $_POST['tel'] . "<br>";
//     echo "Social Security Number: " . $_POST['ssn'] . "<br>";
//     echo "Primary Physician ID: " . $_POST['physician_id'] . "<br>";
//     echo "Blood Type: " . $_POST['blood_type'] . "<br>";
// }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sqlChief = "SELECT EmploymentNumber FROM Personnel WHERE Role = 'Chief of Staff' LIMIT 1";
    $resultChief = $conn->query($sqlChief);
    $chiefPhysicianId = null;

    if ($resultChief->num_rows > 0) {
        $row = $resultChief->fetch_assoc();
        $chiefPhysicianId = $row['EmploymentNumber'];
    }

    $physicianId = empty($_POST['physician_id']) ? $chiefPhysicianId : $_POST['physician_id'];

    $sql = "INSERT INTO Patient (Name, Gender, DateOfBirth, Address, TelephoneNumber, SocialSecurityNumber, PrimaryPhysician, BloodType) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssis", $_POST['name'], $_POST['gender'], $_POST['dob'], $_POST['address'], $_POST['tel'], $_POST['ssn'], $physicianId, $_POST['blood_type']);
    $stmt->execute();

// After the INSERT query execution
if ($stmt->affected_rows > 0) {
    echo "New patient added successfully<br>";

    // Query to get the newly added patient's data
    $sqlSelect = "SELECT pa.*, pe.Name AS 'PhysicianName' FROM Patient pa Inner Join Personnel pe on pa.PrimaryPhysician = pe.EmploymentNumber WHERE PatientNumber = $conn->insert_id";
    $resultSelect = $conn->query($sqlSelect);

    if ($resultSelect->num_rows > 0) {
        $row = $resultSelect->fetch_assoc();
        // Display patient data
        echo "Patient ID" . $row["PatientNumber"] . "<br>";
        echo "Name: " . $row["Name"] . "<br>";
        echo "Gender: " . $row["Gender"] . "<br>";
        echo "Date of Birth: " . $row["DateOfBirth"] . "<br>";
        echo "Address: " . $row["Address"] . "<br>";
        echo "Telephone Number: " . $row["TelephoneNumber"] . "<br>";
        echo "Social Security Number: " . $row["SocialSecurityNumber"] . "<br>";
        echo "Primary Physician: " . $row["PhysicianName"] . "<br>";
        echo "Blood Type: " . $row["BloodType"] . "<br>";
        // ... Display other fields similarly ...
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

// Buttons to return to home or add another patient

echo '<a href="index.php"><button>Return to Home Page</button></a>';
echo '<a href="add_patient_form.php"><button>Add Another Patient</button></a>';
// Inside the if block where you display patient data
echo '<form action="delete_patient.php" method="post">';
echo '<input type="hidden" name="patientId" value="' . $row["PatientNumber"] . '">';
echo '<input type="submit" value="Delete Patient">';
echo '</form>';

}

?>




