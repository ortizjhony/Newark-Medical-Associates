DELIMITER $$

CREATE TRIGGER trg_before_insert_medicalmeasurement
BEFORE INSERT ON MedicalMeasurement
FOR EACH ROW
BEGIN
    DECLARE totalCholesterol INT DEFAULT (NEW.CholesterolHDL + NEW.CholesterolLDL + NEW.Triglyceride / 5);
    DECLARE cholesterolRatio DECIMAL(10,2) DEFAULT (totalCholesterol / NEW.CholesterolHDL);

    IF cholesterolRatio < 4 THEN
        SET NEW.HeartDiseaseRisk = 'N';
    ELSEIF cholesterolRatio >= 4 AND cholesterolRatio <= 5 THEN
        SET NEW.HeartDiseaseRisk = 'L';
    ELSEIF cholesterolRatio > 5 THEN
        SET NEW.HeartDiseaseRisk = 'M';
    END IF;
    -- Note that 'H' is not set here as it's not based on cholesterol alone.
END$$

DELIMITER ;



DELIMITER $$

CREATE TRIGGER trg_before_insert_nurseassignment
BEFORE INSERT ON NurseSurgeryAssignment
FOR EACH ROW
BEGIN
    DECLARE nurse_surgery_count INT;

    -- Check if the nurse is already assigned to a surgery type
    SELECT COUNT(*) INTO nurse_surgery_count
    FROM NurseSurgeryAssignment
    WHERE NurseID = NEW.NurseID;

    IF nurse_surgery_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'A nurse cannot be assigned to more than one surgery type.';
    END IF;
END$$

DELIMITER ;


DELIMITER $$

CREATE TRIGGER trg_before_insert_surgeryschedule
BEFORE INSERT ON SurgerySchedule
FOR EACH ROW
BEGIN
    DECLARE nurse_count INT;

    -- Count the number of nurses assigned to the surgery type
    SELECT COUNT(*) INTO nurse_count
    FROM NurseSurgeryAssignment
    WHERE SurgeryCode = NEW.SurgeryCode;

    IF nurse_count < 2 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Each type of surgery must have at least two nurses.';
    END IF;
END$$

DELIMITER ;


DELIMITER $$

CREATE TRIGGER trg_after_delete_physician
AFTER DELETE ON Physician
FOR EACH ROW
BEGIN
    -- Delete prescriptions by the physician
    DELETE FROM Prescription WHERE Physician = OLD.EmploymentNumber;
END$$

DELIMITER ;


DELIMITER $$

CREATE TRIGGER trg_after_delete_primaryphysician
AFTER DELETE ON Physician
FOR EACH ROW
BEGIN
    DECLARE default_physician_id INT;

    -- Assume there is a field in the Physician table that marks the chief of staff
    -- This query gets the EmploymentNumber of the chief of staff
    SELECT EmploymentNumber INTO default_physician_id
    FROM Physician
    WHERE IsChiefOfStaff = TRUE
    LIMIT 1;

    -- Reassign patients to the chief of staff
    UPDATE Patient
    SET PrimaryPhysician = default_physician_id
    WHERE PrimaryPhysician = OLD.EmploymentNumber;
END$$

DELIMITER ;


DELIMITER $$

CREATE TRIGGER trg_after_insert_prescription
AFTER INSERT ON Prescription
FOR EACH ROW
BEGIN
    -- Decrease the quantity on hand by the amount prescribed
    UPDATE Medication
    SET QuantityOnHand = QuantityOnHand - NEW.Dosage -- Assuming Dosage is a quantity here
    WHERE MedicationCode = NEW.MedicationCode;
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER After_Patient_Delete
AFTER DELETE ON Patient
FOR EACH ROW
BEGIN
    DELETE FROM Consultation WHERE PatientNumber = OLD.PatientNumber;
    -- Add additional DELETE statements for related records
END$$

DELIMITER ;


DELIMITER $$

CREATE TRIGGER Before_Nurse_Delete
BEFORE DELETE ON Nurse
FOR EACH ROW
BEGIN
    -- Set to NULL or a default nurse
    UPDATE InPatient
    SET AttendingNurse = NULL  -- or set to a default nurse
    WHERE AttendingNurse = OLD.EmploymentNumber;
END$$

DELIMITER ;


DELIMITER $$

CREATE TRIGGER Before_Physician_Delete_Prescription
BEFORE DELETE ON Physician
FOR EACH ROW
BEGIN
    DELETE FROM Prescription
    WHERE Physician = OLD.EmploymentNumber;
END$$

DELIMITER ;

ALTER TABLE Physician ADD CONSTRAINT fk_physician_personnel
FOREIGN KEY (EmploymentNumber) REFERENCES Personnel(EmploymentNumber)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE Surgeon ADD CONSTRAINT fk_surgeon_personnel
FOREIGN KEY (EmploymentNumber) REFERENCES Personnel(EmploymentNumber)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE Nurse ADD CONSTRAINT fk_nurse_personnel
FOREIGN KEY (EmploymentNumber) REFERENCES Personnel(EmploymentNumber)
ON DELETE CASCADE ON UPDATE CASCADE;
