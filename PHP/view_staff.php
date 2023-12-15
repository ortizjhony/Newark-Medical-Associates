<?php
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jobType = $_POST['jobType'];

    switch ($jobType) {
        case 'Physician':
            $sql = "SELECT EmploymentNumber, Name, Gender, Address, TelephoneNumber, CONCAT('$', FORMAT(Salary, 2)) AS Salary, Role, Specialty FROM Personnel WHERE Role = 'Physician'";
            $result = $conn->query($sql);
            if (!$result) {
                echo "Error executing query: " . $conn->error;
            } else {
                // Display the results in a table
                // ...
                echo "<h2>$jobType</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Employee ID</th><th>EmployeeEmployee Name</th><th>Gender</th><th>Address</th><th>TelephoneNumber</th><th>Salary</th><th>Staff Role</th><th>Specialty</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['EmploymentNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['TelephoneNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Salary']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Role']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Specialty']) . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

            }
            break;
        case 'Surgeon':
            $sql = "SELECT EmploymentNumber, Name, Gender, Address, TelephoneNumber, Role, Specialty, ContractType, ContractLength FROM `Personnel` WHERE Role = 'Surgeon'";
            $result = $conn->query($sql);
            if (!$result) {
                echo "Error executing query: " . $conn->error;
            } else {
                // Display the results in a table
                // ...
                echo "<h2>$jobType</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Gender</th><th>Address</th><th>TelephoneNumber</th><th>Staff Role</th><th>Specialty</th><th>Contract</th><th>Contract Years</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['EmploymentNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['TelephoneNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Role']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Specialty']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ContractType']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ContractLength']) . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

            }
            break;
        case 'Nurse':
           $sql = "SELECT EmploymentNumber , Name, Gender, Address, TelephoneNumber, CONCAT('$',FORMAT(Salary, 2)) AS Salary, Role, Grade, YearsExperience FROM `Personnel` WHERE Role = 'Nurse'";
            $result = $conn->query($sql);
            if (!$result) {
                echo "Error executing query: " . $conn->error;
            } else {
                // Display the results in a table
                // ...
                echo "<h2>$jobType</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Gender</th><th>Address</th><th>TelephoneNumber</th><th>Salary</th><th>Staff Role</th><th>Grade</th><th>Years of Experience</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['EmploymentNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['TelephoneNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Salary']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Role']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Grade']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['YearsExperience']) . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

            }
            break;
        case 'Support Staff':
           $sql = "SELECT EmploymentNumber, Name, Gender, Address, TelephoneNumber, CONCAT('$',FORMAT(Salary, 2)) AS Salary, Role FROM `Personnel` WHERE Role = 'Support Staff'";
            $result = $conn->query($sql);
            if (!$result) {
                echo "Error executing query: " . $conn->error;
            } else {
                // Display the results in a table
                // ...
                echo "<h2>$jobType</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Gender</th><th>Address</th><th>TelephoneNumber</th><th>Salary</th><th>Staff Role</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['EmploymentNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['TelephoneNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Salary']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Role']) . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

            }
            break;
        case 'Chief of Staff':
           $sql = "SELECT EmploymentNumber, Name, Gender, Address, TelephoneNumber, CONCAT('$',FORMAT(Salary, 2)) AS Salary, Role FROM `Personnel` WHERE Role = 'Chief of Staff'";
            $result = $conn->query($sql);
            if (!$result) {
                echo "Error executing query: " . $conn->error;
            } else {
                // Display the results in a table
                // ...
                echo "<h2>$jobType</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Gender</th><th>Address</th><th>TelephoneNumber</th><th>Salary</th><th>Staff Role</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['EmploymentNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['TelephoneNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Salary']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Role']) . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

            }
            break;
        default:
            // code...

            $sql = "SELECT EmploymentNumber, Name, Gender, Address, TelephoneNumber, Role FROM `Personnel`";
            $result = $conn->query($sql);
            if (!$result) {
                echo "Error executing query: " . $conn->error;
            } else {
                // Display the results in a table
                // ...
                echo "<h2>All Personnel</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Gender</th><th>Address</th><th>TelephoneNumber</th><th>Staff Role</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['EmploymentNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['TelephoneNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Role']) . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

            }           
            break;
    }
} else {
    echo "Invalid request method.";
}


$conn->close();


echo '<a href="Add_Personnel_form.php"><button>Add Personnel</button></a>';
echo "<a href='delete_personnel.php'><button>Delete Personnel</button></a>";
echo '<a href="Personnel.php"><button>Return to View Staff Page</button></a>';
echo '<a href="index.php"><button>Return to Home Page</button></a>';
?>
