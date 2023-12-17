
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
    <div class="container-fluid">

      
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

            <div id="consultation-details">
                
            <?php
                include('session.php');

                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                $consultation_id = null; // Initialize consultation_id

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Retrieve form data
                    $consultation_id = $_POST['consultation_id'];
                    $hdl = $_POST['hdl'];
                    $ldl = $_POST['ldl'];
                    $tri = $_POST['tri'];
                    $blood = $_POST['blood'];
                    $allergy = $_POST['allergy']; // Allergy code (if selected)
                    $illness = $_POST['illness']; // Illness code (if selected)
                    $notes = $_POST['notes'];
                    $patientId = $_POST['patient_id']; // Use $_POST to get patient_id

                    // Calculate heart disease risk based on HDL, LDL, and triglycerides
                    function calculateHeartDiseaseRisk($hdl, $ldl, $tri) {
                        $totalCholesterol = $hdl + $ldl + ($tri / 5);
                        $cholesterolHDLRatio = $totalCholesterol / $hdl;

                        if ($cholesterolHDLRatio < 4) {
                            return "N"; // None
                        } elseif ($cholesterolHDLRatio >= 4 && $cholesterolHDLRatio <= 5) {
                            return "L"; // Low
                        } elseif ($cholesterolHDLRatio > 5 && $cholesterolHDLRatio <= 6) {
                            return "M"; // Moderate
                        } else {
                            return "H"; // High
                        }
                    }

                    $heartDiseaseRisk = calculateHeartDiseaseRisk($hdl, $ldl, $tri);

                    // Insert data into the MedicalData table
                    $sql = "INSERT INTO MedicalData (ConsultationID, CholesterolHDL, CholesterolLDL, Triglyceride, BloodSugar, HeartDiseaseRisk) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("iiiiis", $consultation_id, $hdl, $ldl, $tri, $blood, $heartDiseaseRisk);

                    if ($stmt->execute()) {
                        // If allergy is selected, insert into PatientAllergy table
                        if (!empty($allergy)) {
                            $sql = "INSERT INTO PatientAllergy (ConsultationID, AllergyCode) VALUES (?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ii", $consultation_id, $allergy);
                            if ($stmt->execute()) {
                                echo "Allergy data inserted successfully.<br>";
                            } else {
                                echo "Error inserting allergy data: " . $conn->error . "<br>";
                            }
                        }

                        // If illness is selected, insert into PatientIllness table
                        if (!empty($illness)) {
                            $sql = "INSERT INTO PatientIllness (ConsultationID, IllnessCode) VALUES (?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ii", $consultation_id, $illness);
                            if ($stmt->execute()) {
                                echo "Illness data inserted successfully.<br>";
                            } else {
                                echo "Error inserting illness data: " . $conn->error . "<br>";
                            }
                        }

                        // Update Consultation table with Notes
                        $sql = "UPDATE Consultation SET Notes = ? WHERE ConsultationID = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("si", $notes, $consultation_id);

                        if ($stmt->execute()) {
                            echo "Consultation details inserted successfully.<br>";
                        } else {
                            echo "Error updating consultation details: " . $conn->error . "<br>";
                        }
                    } else {
                        echo "Error inserting medical data: " . $conn->error . "<br>";
                    }

                    // Display "View Medical History" button if patient_id is set
                    if ($patientId !== null) {
                        echo "<a href='view_medical_history.php?patient_id=" . $patientId . "'><button type='button' class='btn mb-1 btn-outline-primary'>View Medical History</button></a>";
                    }
                } else {
                    echo "Invalid request method.";
                }

                $conn->close();


                ?>
            </div>
            

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
</div>



<script src="/NMA/bootstrap-theme/theme/plugins/common/common.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/custom.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/settings.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/gleek.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/styleSwitcher.js"></script>

</body>
</html>
