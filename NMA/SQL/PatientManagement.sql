-- 1. Insert a New Patient

INSERT INTO Patient 
(Name, Gender, DateOfBirth, Address, TelephoneNumber, SocialSecurityNumber, PrimaryPhysician, BloodType) 
VALUES
('John Doe', 'M', '1990-01-01', '123 Example Street', '555-6789', '123-45-6789', 1, 'O');

-- 2. View Patient Information

SELECT * FROM Patient WHERE Name = 'John Doe';

-- 3. Schedule an Appointment with a Doctor

INSERT INTO Consultation 
(PatientNumber, PhysicianNumber, ConsultationDateTime, Notes) 
VALUES
((SELECT PatientNumber FROM Patient WHERE Name = 'John Doe'), 2, '2023-12-15 14:00:00', 'Routine check-up');

-- 4. Check Previous Diagnoses and Illnesses

SELECT i.Description 
FROM PatientIllness pi
JOIN Illness i ON pi.IllnessCode = i.IllnessCode
WHERE pi.ConsultationID IN (SELECT ConsultationID FROM Consultation WHERE PatientNumber = (SELECT PatientNumber FROM Patient WHERE PatientNumber = 2));

-- 5. View Schedule per Doctor and per Day
SELECT c.ConsultationDateTime, p.Name AS PatientName
FROM Consultation c
JOIN Patient p ON c.PatientNumber = p.PatientNumber
WHERE c.PhysicianNumber = 2 AND DATE(c.ConsultationDateTime) = '2023-12-15';

