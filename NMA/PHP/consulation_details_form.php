<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>Consultation Details</title>
  
</head>
<body>
<div id="main-wrapper">
    
    <?php
        include('navigation.php');
        ?>

 
        <div class="content-body">
            <div class="col-lg-12 container-fluid">
                <div class="card">
                    <div class="card-body">
        
                        <div class="basic-form">
                            
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
                                    echo '<input type="hidden" name="consultation_id" value="' . $consultation_id . '" class="form-control">';

                                // Add a hidden input field for patient_id
                                    echo '<input type="hidden" name="patient_id" value="' . $patient_id . '" class="form-control">';

                                    // Add input fields for consultation details (e.g., HDL, LDL, Triglycerides, etc.)
                                    echo '<label for="hdl">Cholesterol HDL:</label>';
                                    echo '<input type="text" id="hdl" name="hdl" class="form-control" required><br><br>';
                                    echo '<label for="ldl">Cholesterol LDL:</label>';
                                    echo '<input type="text" id="ldl" name="ldl" class="form-control" required><br><br>';
                                    echo '<label for="tri">Triglycerides:</label>';
                                    echo '<input type="text" id="tri" name="tri" class="form-control" required><br><br>';
                                    echo '<label for="blood">Blood Sugar:</label>';
                                    echo '<input type="text" id="blood" name="blood" class="form-control" required><br><br>';
                                    // Add more fields as needed


                                    echo '<label for="allergy">Allergy:</label>';
                                    echo '<select id="allergy" name="allergy" class="form-control">';
                                    echo '<option value="">Select an Allergy</option>'; // Default option
                                    // Fetch allergies from the database and populate the dropdown
                                    $sql = "SELECT * FROM Allergy";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['AllergyCode'] . '">' . $row['Description'] . '</option>';
                                    }
                                    echo '</select><br><br>';

                                    echo '<label for="illness">Illness:</label>';
                                    echo '<select id="illness" name="illness" class="form-control">';
                                    echo '<option value="">Select an illness</option>'; // Default option
                                    // Fetch allergies from the database and populate the dropdown
                                    $sql = "SELECT * FROM illness";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['IllnessCode'] . '">' . $row['Description'] . '</option>';
                                    }
                                    echo '</select><br><br>';


                                    echo '<label for="notes">Consulation Notes:</label>';
                                    echo '<input type="text" id="notes" name="notes" required class="form-control"><br><br>';


                                    echo '<button class="btn btn-success btn" type="submit" value="Submit Consultation Details">Submit Consultation Details</button>';
                                    echo '</form>';
                                } else {
                                    echo "No consultation found for Consultation ID: $consultation_id";
                                }
                            } else {
                                echo "No Consultation ID provided.";
                            }

                            $conn->close();
                            ?>

                                <div class="row justify-content-between">
                
                                    <div class="col-1"> </div>
                                    <div class="col-6">    
                                    
                                    <a href="view_schedule.php"><button type="button" class="btn mb-1 btn-primary">Return to View Schedule</button></a>
                                    <a href="index.php"><button type="button" class="btn mb-1 btn-primary">Return to Home Page</button></a>
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

