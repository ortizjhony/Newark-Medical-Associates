-- 1. Check for Available Room/Bed

SELECT RoomNumber, BedNumber 
FROM Room
WHERE Occupied = FALSE;


-- 2. Assign/Remove a Patient to a Room/Bed

	-- Assign
	UPDATE Room
	SET Occupied = TRUE, CurrentPatient = [InPatientID]
	WHERE RoomNumber = '[Room_Number]' AND BedNumber = '[Bed_Number]';

	-- Remove
	UPDATE Room
	SET Occupied = FALSE, CurrentPatient = NULL
	WHERE RoomNumber = '[Room_Number]' AND BedNumber = '[Bed_Number]';



-- 3.Assign/Remove a Doctor to a Patient

-- Assign a doctor
UPDATE Patient
SET PrimaryPhysician = [Doctor_EmploymentNumber]
WHERE PatientNumber = [Patient_Number];

-- Remove a doctor
UPDATE Patient
SET PrimaryPhysician = NULL
WHERE PatientNumber = [Patient_Number];

-- 4. Assign/Remove a Nurse to a Patient

	-- Assign a nurse
	UPDATE InPatient
	SET AttendingNurse = [Nurse_EmploymentNumber]
	WHERE InPatientID = [InPatientID];

	-- Remove a nurse
	UPDATE InPatient
	SET AttendingNurse = NULL
	WHERE InPatientID = [InPatientID];

-- 5. View Scheduled Surgery per Room and per Day
SELECT SurgeryDateTime, SurgeryCode
FROM SurgerySchedule
WHERE OperationTheatre = 'Theatre 1' -- AND DATE(SurgeryDateTime) = '[YYYY-MM-DD]';

-- 6. View Scheduled Surgery per Surgeon and per Day

SELECT SurgeryDateTime, SurgeryCode
FROM SurgerySchedule
WHERE Surgeon = 4; -- AND DATE(SurgeryDateTime) = '[YYYY-MM-DD]';

-- 7. Book a Surgery

INSERT INTO SurgerySchedule (SurgeryCode, OperationTheatre, Surgeon, Patient, SurgeryDateTime) 
VALUES (2, 'Theatre 2', 4, 3, '2023-07-15 15:00:00');

-- 8. View Scheduled Surgery per Patient
SELECT SurgeryDateTime, SurgeryCode
FROM SurgerySchedule
WHERE Patient = 2;
