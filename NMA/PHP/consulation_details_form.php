<?php
include('session.php');

// Check if patient ID is set in the URL
if (isset($_GET['consultation_id'])) {
    $consultation_id = $_GET['consultation_id'];

    // Fetch the relevant consultation data (you can customize the SQL query)
    $sql = "SELECT * FROM Consultation WHERE ConsultationID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $consultation_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Display the consultation ID and patient name
        $patient_id = $row['PatientNumber'];
        $consultation_date_time = $row['ConsultationDateTime'];

        // Fetch the patient name
        $sql = "SELECT Name FROM Patient WHERE PatientNumber = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $patient_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($patient = $result->fetch_assoc()) {
            $patient_name = $patient['Name'];
        }

        echo "<h2>Consultation Details for Consultation ID: $consultation_id</h2>";
        echo "<p>Patient Name: $patient_name</p>";
        echo "<p>Consultation Date and Time: $consultation_date_time</p>";

        // Add your consultation details form here
        echo '<form action="process_consultation_details.php" method="POST">';
        echo '<input type="hidden" name="consultation_id" value="' . $consultation_id . '">';

       // Add a hidden input field for patient_id
        echo '<input type="hidden" name="patient_id" value="' . $patient_id . '">';

        // Add input fields for consultation details (e.g., HDL, LDL, Triglycerides, etc.)
        echo '<label for="hdl">Cholesterol HDL:</label>';
        echo '<input type="text" id="hdl" name="hdl" required><br><br>';
        echo '<label for="ldl">Cholesterol LDL:</label>';
        echo '<input type="text" id="ldl" name="ldl" required><br><br>';
        echo '<label for="tri">Triglycerides:</label>';
        echo '<input type="text" id="tri" name="tri" required><br><br>';
        echo '<label for="blood">Blood Sugar:</label>';
        echo '<input type="text" id="blood" name="blood" required><br><br>';
        // Add more fields as needed


        echo '<label for="allergy">Allergy:</label>';
        echo '<select id="allergy" name="allergy">';
        echo '<option value="">Select an Allergy</option>'; // Default option
        // Fetch allergies from the database and populate the dropdown
        $sql = "SELECT * FROM Allergy";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['AllergyCode'] . '">' . $row['Description'] . '</option>';
        }
        echo '</select><br><br>';

        echo '<label for="illness">Illness:</label>';
        echo '<select id="illness" name="illness">';
        echo '<option value="">Select an illness</option>'; // Default option
        // Fetch allergies from the database and populate the dropdown
        $sql = "SELECT * FROM illness";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['IllnessCode'] . '">' . $row['Description'] . '</option>';
        }
        echo '</select><br><br>';


        echo '<label for="notes">Consulation Notes:</label>';
        echo '<input type="text" id="notes" name="notes" required><br><br>';


        echo '<input type="submit" value="Submit Consultation Details">';
        echo '</form>';
    } else {
        echo "No consultation found for Consultation ID: $consultation_id";
    }
} else {
    echo "No Consultation ID provided.";
}

$conn->close();

echo '<a href="view_schedule.php"><button>Return to View Schedule</button></a>';
echo '<a href="index.php"><button>Return to Home Page</button></a>';
?>
