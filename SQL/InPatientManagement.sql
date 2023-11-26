-- Check for Available Room/Bed

SELECT NursingUnit, RoomNumber, BedNumber
FROM InPatient
WHERE PatientNumber IS NULL;


-- Assign/Remove a Patient to a Room/Bed

	-- Assign
	UPDATE InPatient
	SET PatientNumber = 1
	WHERE NursingUnit = 1 AND RoomNumber = '101' AND BedNumber = 'A';

	-- Remove
	UPDATE InPatient
	SET PatientNumber = NULL
	WHERE PatientNumber = 1;


--Assing/Remove a Doctor to a Patient
	-- Assign
	UPDATE Patient
	SET PrimaryPhysician = 2
	WHERE PatientNumber = 1;

	-- Remove
	UPDATE Patient
	SET PrimaryPhysician = NULL
	WHERE PatientNumber = 1;



-- Assign/Remove a Nurse to a Patient

	-- Assuming there is a NursePatient table to assign nurses to patients
	-- Assign
	INSERT INTO NursePatient (NurseID, PatientNumber) VALUES
	(5, 1);

	-- Remove
	DELETE FROM NursePatient
	WHERE NurseID = 5 AND PatientNumber = 1;


-- View Scheduled Surgery per Surgeon and per Day
SELECT * FROM SurgerySchedule
WHERE Surgeon = 3 AND DATE(SurgeryDateTime) = '2023-12-01';


-- Book Surgery

INSERT INTO SurgerySchedule (SurgeryCode, OperationTheatre, Surgeon, Patient, SurgeryDateTime) VALUES
(1, 'OR1', 3, 1, '2023-12-15 08:00:00');


-- View Scheduled Surgery per Patient
SELECT * FROM SurgerySchedule
WHERE Patient = 1;


