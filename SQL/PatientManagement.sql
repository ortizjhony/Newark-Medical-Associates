
-- Inserting a New Patient
INSERT INTO Patient (Name, Gender, DateOfBirth, Address, TelephoneNumber, SocialSecurityNumber, PrimaryPhysician) VALUES
('John Doe', 'M', '1975-05-15', '100 Main St', '555-1010', 'SSN123456', 1);

-- View Patient Information
SELECT * FROM Patient WHERE PatientNumber = 1;

-- Scheduling an Appointment with a Doctor
INSERT INTO Consultation (PatientNumber, PhysicianNumber, ConsultationDateTime, Notes) VALUES
(1, 1, '2023-12-01 10:00:00', 'Annual check-up');


-- Check Previous Diagnoses and Illnesses
SELECT Ill.Description
FROM Illness Ill
JOIN PatientIllness PI ON Ill.IllnessCode = PI.IllnessCode
WHERE PI.PatientNumber = 1;


-- View Scheduled Appoinments per Doctor and per Day
SELECT * FROM Consultation
WHERE PhysicianNumber = 1 AND DATE(ConsultationDateTime) = '2023-12-01';
