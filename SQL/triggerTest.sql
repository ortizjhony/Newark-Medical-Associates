-- This should succeed
INSERT INTO NurseSurgeryAssignment (NurseID, SurgeryCode) VALUES
(4, 1);

-- This should fail because of the trg_before_insert_nurseassignment trigger
INSERT INTO NurseSurgeryAssignment (NurseID, SurgeryCode) VALUES
(4, 2);


-- First, make sure there's only one nurse assigned to SurgeryCode 1
DELETE FROM NurseSurgeryAssignment WHERE SurgeryCode = 1 AND NurseID != 4;

-- This should fail because of the trg_before_insert_surgeryschedule trigger
INSERT INTO SurgerySchedule (SurgeryCode, OperationTheatre, Surgeon, Patient, SurgeryDateTime) VALUES
(1, 'OR1', 3, 1, NOW() + INTERVAL 1 DAY);


-- First, make sure there's a prescription assigned to Physician with EmploymentNumber 1
INSERT INTO Prescription (Physician, Patient, MedicationCode, Dosage, Frequency) VALUES
(1, 1, 1, '10mg', 'Once a day');

-- Delete the physician
DELETE FROM Physician WHERE EmploymentNumber = 1;

-- This query should return no rows if the trg_after_delete_physician trigger worked
SELECT * FROM Prescription WHERE Physician = 1;


-- First, make sure there's a consultation assigned to Patient with PatientNumber 1
INSERT INTO Consultation (PatientNumber, PhysicianNumber, ConsultationDateTime, Notes) VALUES
(1, 1, NOW(), 'Consultation notes');

-- Delete the patient
DELETE FROM Patient WHERE PatientNumber = 1;

-- This query should return no rows if the After_Patient_Delete trigger worked
SELECT * FROM Consultation WHERE PatientNumber = 1;


-- Insert a medical measurement with known cholesterol levels
INSERT INTO MedicalMeasurement (ConsultationID, BloodType, CholesterolHDL, CholesterolLDL, Triglyceride, BloodSugar) VALUES
(1, 'A', 50, 100, 150, 100);

-- Retrieve the record and check if HeartDiseaseRisk is set
-- The trigger trg_before_insert_medicalmeasurement should have set the risk level based on the cholesterol ratio
SELECT * FROM MedicalMeasurement WHERE ConsultationID = 1;


-- First, ensure there's a chief of staff assigned
-- Let's say EmploymentNumber 2 is the chief of staff for this example
UPDATE Physician SET IsChiefOfStaff = TRUE WHERE EmploymentNumber = 2;

-- Now, delete a physician who has patients
DELETE FROM Physician WHERE EmploymentNumber = 1;

-- Check if the patients' PrimaryPhysician has been set to the chief of staff
-- The trigger trg_after_delete_primaryphysician should have reassigned the patients
SELECT * FROM Patient WHERE PrimaryPhysician = 2;
