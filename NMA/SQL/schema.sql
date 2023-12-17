-- CREATE Database
DROP DATABASE MMA;
CREATE DATABASE MMA;

USE MMA;

-- Personnel Table
CREATE TABLE Personnel (
    EmploymentNumber INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL,
    Gender CHAR(1) CHECK (Gender IN ('M', 'F')),
    Address VARCHAR(255) NOT NULL,
    TelephoneNumber VARCHAR(15),
    Salary DECIMAL(8, 2), -- NULL for surgeons
    Role VARCHAR(50),
    Specialty VARCHAR(50), -- For Physicians
    Grade INT CHECK (Grade BETWEEN 1 AND 10), -- For Nurses
    YearsExperience INT CHECK (YearsExperience >= 0), -- For Nurses
    ContractType VARCHAR(50), -- For Surgeons
    ContractLength INT CHECK (ContractLength > 0) -- For Surgeons
);

-- Surgery Skill Table
CREATE TABLE SurgerySkill (
    SkillCode INT PRIMARY KEY AUTO_INCREMENT,
    Description VARCHAR(255) NOT NULL
);

-- Surgery Table
CREATE TABLE Surgery (
    SurgeryCode INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL,
    Category CHAR(1) CHECK (Category IN ('H', 'O')),
    AnatomicalLocation VARCHAR(255) NOT NULL,
    SpecialNeeds VARCHAR(255)
);


-- Medication Table
CREATE TABLE Medication (
    MedicationCode INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL,
    QuantityOnHand INT CHECK (QuantityOnHand >= 0),
    QuantityOnOrder INT CHECK (QuantityOnOrder >= 0),
    UnitCost DECIMAL(8, 2) NOT NULL,
    YearToDateUsage INT CHECK (YearToDateUsage >= 0)
);

-- Illness Table
CREATE TABLE Illness (
    IllnessCode INT PRIMARY KEY AUTO_INCREMENT,
    Description VARCHAR(255) NOT NULL
);

-- Allergy Table
CREATE TABLE Allergy (
    AllergyCode INT PRIMARY KEY AUTO_INCREMENT,
    Description VARCHAR(255) NOT NULL
);


-- Patient Table
CREATE TABLE Patient (
    PatientNumber INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL,
    Gender CHAR(1) CHECK (Gender IN ('M', 'F')),
    DateOfBirth DATE NOT NULL,
    Address VARCHAR(255) NOT NULL,
    TelephoneNumber VARCHAR(15),
    SocialSecurityNumber VARCHAR(11) UNIQUE NOT NULL,
    PrimaryPhysician INT,
    BloodType VARCHAR(3) CHECK (BloodType IN ('A', 'B', 'AB', 'O', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-')),
    FOREIGN KEY (PrimaryPhysician) REFERENCES Personnel(EmploymentNumber)
    ON DELETE SET NULL
);


CREATE TABLE Ownership (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    CorporationName VARCHAR(100), -- NULL if the owner is a physician
    PhysicianID INT, -- NULL if the owner is a corporation
    PhysicianName VARCHAR(100), -- NULL if the owner is a corporation
    Headquarters VARCHAR(255), -- NULL if the owner is a physician
    PercentageOwnership DECIMAL(5, 2) NOT NULL CHECK (PercentageOwnership > 0 AND PercentageOwnership <= 100)
    -- Add a constraint to ensure that either CorporationName or PhysicianID is filled
);

-- Consultation Table
CREATE TABLE Consultation (
    ConsultationID INT PRIMARY KEY AUTO_INCREMENT,
    PatientNumber INT NOT NULL,
    PhysicianNumber INT NOT NULL,
    ConsultationDateTime DATETIME NOT NULL,
    Notes TEXT
);

CREATE TABLE MedicalData (
    MeasurementID INT PRIMARY KEY AUTO_INCREMENT,
    ConsultationID INT,
    CholesterolHDL INT CHECK (CholesterolHDL > 0),
    CholesterolLDL INT CHECK (CholesterolLDL > 0),
    Triglyceride INT CHECK (Triglyceride > 0),
    BloodSugar INT CHECK (BloodSugar > 0),
    HeartDiseaseRisk CHAR(1), -- 'N', 'L', 'M', 'H'
    FOREIGN KEY (ConsultationID) REFERENCES Consultation(ConsultationID)
);

-- PatientIllness Table
CREATE TABLE PatientIllness (
    ConsultationID INT,
    IllnessCode INT,
    PRIMARY KEY (ConsultationID, IllnessCode),
    FOREIGN KEY (ConsultationID) REFERENCES Consultation(ConsultationID),
    FOREIGN KEY (IllnessCode) REFERENCES Illness(IllnessCode)
);

-- PatientAllergy Table
CREATE TABLE PatientAllergy (
    ConsultationID INT,
    AllergyCode INT,
    PRIMARY KEY (ConsultationID, AllergyCode),
    FOREIGN KEY (ConsultationID) REFERENCES Consultation(ConsultationID),
    FOREIGN KEY (AllergyCode) REFERENCES Allergy(AllergyCode)
);


-- NurseSkill Table
CREATE TABLE NurseSkill (
    NurseID INT,
    SkillCode INT,
    PRIMARY KEY (NurseID, SkillCode),
    FOREIGN KEY (NurseID) REFERENCES Personnel(EmploymentNumber) ON DELETE CASCADE,
    FOREIGN KEY (SkillCode) REFERENCES SurgerySkill(SkillCode)
);


-- SurgerySkillRequirement Table
CREATE TABLE SurgerySkillRequirement (
    SurgeryCode INT,
    SkillCode INT,
    PRIMARY KEY (SurgeryCode, SkillCode),
    FOREIGN KEY (SurgeryCode) REFERENCES Surgery(SurgeryCode),
    FOREIGN KEY (SkillCode) REFERENCES SurgerySkill(SkillCode)
);

-- NurseSurgeryAssignment Table
CREATE TABLE NurseSurgeryAssignment (
    NurseID INT PRIMARY KEY,
    SurgeryCode INT NOT NULL,
    FOREIGN KEY (NurseID) REFERENCES Personnel(EmploymentNumber),
    FOREIGN KEY (SurgeryCode) REFERENCES Surgery(SurgeryCode)
    ON DELETE CASCADE
);



-- Surgery Schedule Table
CREATE TABLE SurgerySchedule (
    ScheduleID INT PRIMARY KEY AUTO_INCREMENT,
    SurgeryCode INT NOT NULL,
    OperationTheatre VARCHAR(50) NOT NULL,
    Surgeon INT NOT NULL,
    Patient INT NOT NULL,
    SurgeryDateTime DATETIME NOT NULL,
    FOREIGN KEY (SurgeryCode) REFERENCES Surgery(SurgeryCode),
	UNIQUE (ScheduleID,SurgeryCode, Surgeon, Patient)
);


-- Prescription Table
CREATE TABLE Prescription (
    PrescriptionID INT PRIMARY KEY AUTO_INCREMENT,
    Physician INT NOT NULL,
    Patient INT NOT NULL,
    MedicationCode INT NOT NULL,
    Dosage VARCHAR(50) NOT NULL,
    Frequency VARCHAR(50) NOT NULL,
    FOREIGN KEY (MedicationCode) REFERENCES Medication(MedicationCode),
    UNIQUE (PrescriptionID,Physician, Patient, MedicationCode)
);

-- MedicationInteraction Table
CREATE TABLE MedicationInteraction (
    MedicationCode1 INT,
    MedicationCode2 INT,
    Severity CHAR(1) CHECK (Severity IN ('S', 'M', 'L', 'N')),
    PRIMARY KEY (MedicationCode1, MedicationCode2),
    FOREIGN KEY (MedicationCode1) REFERENCES Medication(MedicationCode),
    FOREIGN KEY (MedicationCode2) REFERENCES Medication(MedicationCode)
);

-- InPatient Table (for patients staying in the clinic)
CREATE TABLE InPatient (
    InPatientID INT PRIMARY KEY AUTO_INCREMENT,
    PatientNumber INT,
    DateOfAdmission DATE NOT NULL,
    NursingUnit INT CHECK (NursingUnit BETWEEN 1 AND 7),
    AttendingNurse INT,
    FOREIGN KEY (PatientNumber) REFERENCES Patient(PatientNumber),
    FOREIGN KEY (AttendingNurse) REFERENCES Personnel(EmploymentNumber)
    ON DELETE CASCADE
);

CREATE TABLE Room (
    RoomNumber VARCHAR(10),
    BedNumber CHAR(1) CHECK (BedNumber IN ('A', 'B')),
    Occupied BOOLEAN NOT NULL DEFAULT FALSE,
    CurrentPatient INT,
    UNIQUE(RoomNumber,BedNumber)
);



CREATE TABLE JobShift (
    JobShiftID INT PRIMARY KEY AUTO_INCREMENT,
    EmploymentNumber INT NOT NULL,
    ShiftDate DATE NOT NULL,
    ShiftStart TIME NOT NULL,
    ShiftEnd TIME NOT NULL,
    FOREIGN KEY (EmploymentNumber) REFERENCES Personnel(EmploymentNumber)
    ON DELETE CASCADE
);


CREATE TABLE HistoricalPersonnel (
    EmploymentNumber INT,
    Name VARCHAR(100),
    Gender CHAR(1),
    Address VARCHAR(255),
    TelephoneNumber VARCHAR(15),
    Salary DECIMAL(8, 2),
    Role VARCHAR(50),
    Specialty VARCHAR(50),
    Grade INT,
    YearsExperience INT,
    ContractType VARCHAR(50),
    ContractLength INT,
    DeletionDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Patient Table
CREATE TABLE HistoricalPatient (
    PatientNumber INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL,
    Gender CHAR(1) CHECK (Gender IN ('M', 'F')),
    DateOfBirth DATE NOT NULL,
    Address VARCHAR(255) NOT NULL,
    TelephoneNumber VARCHAR(15),
    SocialSecurityNumber VARCHAR(11) UNIQUE NOT NULL,
    PrimaryPhysician INT,
	DeletionDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
