<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>View Staff</title>


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

                               
                            <?php
                                    
                                    include('session.php');
                                    
                                    // Check if patient ID is set in the URL
                                    if (isset($_GET['patient_id'])) {
                                        $patientId = $_GET['patient_id'];
                                    
                                        // Prepare and execute the SQL query to fetch medical history
                                        $sql = "SELECT p.PatientNumber,d.CholesterolHDL, d.CholesterolLDL, d.Triglyceride, d.BloodSugar, d.HeartDiseaseRisk, c.ConsultationDateTime, p.Name 'Patient Name',p.Gender,p.DateOfBirth, TIMESTAMPDIFF(YEAR, p.DateOfBirth, CURDATE()) AS age, p.BloodType, pr.Name 'Primary Doctor', pe.Name 'Consultation Doctor', GROUP_CONCAT(DISTINCT illCode.Description) 'Illnesses', GROUP_CONCAT(DISTINCT allergy.Description) 'Allergy'
                                            FROM MedicalData d
                                            INNER JOIN Consultation c on d.ConsultationID = c.ConsultationID
                                            Inner Join Patient p on c.PatientNumber = p.PatientNumber and c.PatientNumber = ?
                                            LEFT JOIN   Personnel pr on p.PrimaryPhysician = pr.EmploymentNumber
                                            LEFT JOIN Personnel pe on c.PhysicianNumber = pe.EmploymentNumber
                                            LEFT JOIN PatientIllness ill on ill.ConsultationID = c.ConsultationID
                                            LEFT JOIN Illness illCode on ill.IllnessCode = illCode.IllnessCode
                                            Left JOIN PatientAllergy pall on pall.ConsultationID = c.ConsultationID
                                            Left JOIN Allergy allergy on pall.AllergyCode = allergy.AllergyCode
                                            GROUP BY
                                                p.PatientNumber,
                                                d.CholesterolHDL,
                                                d.CholesterolLDL,
                                                d.Triglyceride,
                                                d.BloodSugar,
                                                d.HeartDiseaseRisk,
                                                c.ConsultationDateTime,
                                                p.Name,
                                                p.Gender,
                                                p.DateOfBirth,
                                                age,
                                                p.BloodType,
                                                pr.Name,
                                                pe.Name ";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bind_param("i", $patientId);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                    
                                        // Display the medical history
                                        echo "<h2>Medical History for Patient ID: $patientId</h2>";
                                        echo "<table class='table table-striped table-bordered zero-configuration'>";
                                        echo "<tr><th>Date</th><th>Patient ID</th><th>Patient Name</th><th>Gender</th><th>DOB</th><th>Age</th><th>Blood Type</th><th>HDL</th><th>LDL</th><th>Triglyceride</th><th>Blood Sugar</th><th>Heart Disease Risk</th><th>Primary Doctor</th><th>Consultation Doctor</th><th>Illnesses</th><th>Allergy</th></tr>";
                                    
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr><td>" . $row['ConsultationDateTime'] . "</td><td>" . $row['PatientNumber'] . "</td><td>" . $row['Patient Name'] . "</td><td>" . $row['Gender'] . "</td><td>" . $row['DateOfBirth'] . "</td><td>" . $row['age'] . "</td><td>" . $row['BloodType'] . "</td><td>" . $row['CholesterolHDL'] . "</td><td>" . $row['CholesterolLDL'] . "</td><td>" . $row['Triglyceride'] . "</td><td>" . $row['BloodSugar'] . "</td><td>" . $row['HeartDiseaseRisk'] . "</td><td>" . $row['Primary Doctor'] . "</td><td>" . $row['Consultation Doctor'] . "</td><td>" . $row['Illnesses'] . "</td><td>" . $row['Allergy'] . "</td></tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='3'>No medical history found</td></tr>";
                                        }
                                    
                                        echo "</table>";
                                    
                                        $stmt->close();
                                    } else {
                                        echo "No patient ID provided.";
                                    }
                                    
                                    $conn->close();
                                    
                                    ?>
                                    
                                    
                                    

            
                                <div class="col-5">   
                                    
                                    <a href="view_patient_info.php"><button type="button" class="btn mb-1 btn-primary">Return to View Patient Info</button></a>
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
