-- Inserting sample personnel data including physicians, surgeons, nurses, and support staff
INSERT INTO Personnel 
(Name, Gender, Address, TelephoneNumber, Salary, Role, Specialty, Grade, YearsExperience,ContractType,ContractLength ) VALUES
('Dr. Alice Monroe', 'F', '123 Wellness Road', '555-0101', 150000,'Physician','Geriatric',NULL,NULL,NULL,NULL), -- Physician
('Dr. Bob Wallace', 'M', '456 Health Ave', '555-0202', 160000,'Physician','Primary Care',NULL,NULL,NULL,NULL),     -- Physician
('Dr. Carol Hughes', 'F', '789 Care Blvd', '555-0303', NULL,'Surgeon','Orthopedist',NULL,NULL, 'Independent',3),        -- Surgeon
('Dr. Derek Long', 'M', '321 Cure Street', '555-0404', NULL,'Surgeon','Cardiologist',NULL,NULL,'Independent',2),        -- Surgeon
('Nurse Emma Walsh', 'F', '654 Treat Road', '555-0505', 70000,'Nurse',NULL,5,3,NULL,NULL),      -- Nurse
('Nurse Jackie Ford', 'F', '128 Bandaid Ave', '555-1236', 75000,'Nurse',NULL,7,12,NULL,NULL),      -- Nurse
('Mark Spencer', 'M', '132 Aid Lane', '555-0606', 50000,'Support Staff',NULL,NULL,NULL,NULL,NULL),            -- Support Staff
('Nora Kaye', 'F', '975 Assist Terrace', '555-0707', 45000,'Support Staff',NULL,NULL,NULL,NULL,NULL),      -- Support Staff
('Henry Kayne', 'F', '975 Living Terrace', '555-1122', 150000,'Chief of Staff',NULL,NULL,NULL,NULL,NULL);         -- Chief of Staff
    
-- Inserting surgery skills
INSERT INTO SurgerySkill (Description) VALUES
('General Surgery'),
('Orthopedic Surgery'),
('Cardiothoracic Surgery'),
('Pediatric Surgery');



-- Assuming EmploymentNumber 5 is for Nurse Emma Walsh
-- SkillCode 1, 2, 3 correspond to the above surgery skills
INSERT INTO NurseSkill (NurseID, SkillCode) VALUES
(5, 1),
(5, 2),
(5, 3),
(6, 4);

-- Inserting surgery types
INSERT INTO Surgery (Name, Category, AnatomicalLocation, SpecialNeeds) VALUES
('Appendectomy', 'O', 'Abdomen', NULL),
('Hip Replacement', 'H', 'Hip', 'Orthopedic team required'),
('Heart Transplant', 'H', 'Chest', 'Cardiothoracic specialist required'),
('Tonsillectomy', 'O', 'Throat', NULL);


-- Associating surgery types with required skills
-- SurgeryCode 1, 2, 3, 4 correspond to the above surgery types
INSERT INTO SurgerySkillRequirement (SurgeryCode, SkillCode) VALUES
(1, 1), -- Appendectomy requires General Surgery
(2, 2), -- Hip Replacement requires Orthopedic Surgery
(3, 3), -- Heart Transplant requires Cardiothoracic Surgery
(4, 4); -- Tonsillectomy requires Pediatric Surgery


-- Inserting medications
INSERT INTO Medication (Name, QuantityOnHand, QuantityOnOrder, UnitCost, YearToDateUsage) VALUES
('Medicorin', 300, 100, 15.00, 250),
('PainAway', 500, 150, 5.00, 300),
('Antibioflux', 200, 75, 25.00, 180);

-- Inserting medication interactions
-- MedicationCode 1, 2, 3 correspond to the above medications
INSERT INTO MedicationInteraction (MedicationCode1, MedicationCode2, Severity) VALUES
(1, 2, 'M'),
(2, 3, 'S'),
(1, 3, 'L');


-- Inserting patients
INSERT INTO Patient (Name, Gender, DateOfBirth, Address, TelephoneNumber, SocialSecurityNumber, PrimaryPhysician, BloodType) VALUES
('James Smith', 'M', '1984-06-15', '123 Patient Street', '555-1111', '111-22-3333', 1,'A'),
('Linda Taylor', 'F', '1979-08-25', '456 Recovery Road', '555-2222', '222-33-4444', 2,'B'),
('Ethan Johnson', 'M', '1995-04-12', '789 Healing Way', '555-3333', '333-44-5555', NULL,'AB'); -- No primary physician yet


-- Inserting surgery schedules
-- Assuming EmploymentNumber 3, 4 are for Surgeons Carol Hughes, Derek Long
-- PatientNumber 1, 2 for James Smith, Linda Taylor
-- SurgeryCode 1, 2 for Appendectomy, Hip Replacement
INSERT INTO SurgerySchedule (SurgeryCode, OperationTheatre, Surgeon, Patient, SurgeryDateTime) VALUES
(1, 'Theatre 1', 3, 1, '2023-08-15 09:00:00'),
(2, 'Theatre 2', 4, 2, '2023-08-16 11:00:00');


-- Inserting prescriptions
-- Physician EmploymentNumber 1, 2 for Dr. Alice Monroe, Dr. Bob Wallace
-- PatientNumber 1, 2 for James Smith, Linda Taylor
-- MedicationCode 1, 2 for Medicorin, PainAway
INSERT INTO Prescription (Physician, Patient, MedicationCode, Dosage, Frequency) VALUES
(1, 1, 1, '100mg', 'Twice a day'),
(2, 2, 2, '250mg', 'Once a day');


-- Inserting ownership records
-- EmploymentNumber 1, 2 for Dr. Alice Monroe, Dr. Bob Wallace
INSERT INTO Ownership (CorporationName, PhysicianID, PhysicianName, Headquarters, PercentageOwnership) VALUES
(NULL, 1, 'Dr. Alice Monroe', NULL, 20.00),
('HealthCorp', NULL, NULL, '123 Business Road', 80.00);


-- Inserting consultations
-- PatientNumber 1, 2 for James Smith, Linda Taylor
-- Physician EmploymentNumber 1, 2 for Dr. Alice Monroe, Dr. Bob Wallace
INSERT INTO Consultation (PatientNumber, PhysicianNumber, ConsultationDateTime, Notes) VALUES
(1, 1, '2023-07-10 14:00:00', 'Annual physical examination'),
(2, 2, '2023-07-11 10:00:00', 'Follow-up for medication review');


-- Inserting medical measurements
-- ConsultationID corresponds to previous insertions
INSERT INTO MedicalData (ConsultationID, CholesterolHDL, CholesterolLDL, Triglyceride, BloodSugar) VALUES
(1, 55, 120, 200, 110), -- This would trigger a calculation for heart disease risk
(2, 65, 130, 180, 90);  -- This would trigger a calculation for heart disease risk


-- Inserting JobShift
INSERT INTO JobShift (EmploymentNumber, ShiftDate, ShiftStart, ShiftEnd) VALUES
(4, '2023-12-01', '08:00', '17:00'),
(5, '2023-12-01', '12:00', '21:00'),
(6, '2023-12-01', '20:00', '06:00'),
(7, '2023-12-01', '08:00', '17:00'),
(8, '2023-12-01', '12:00', '21:00');


INSERT INTO Illness (Description) VALUES
('Influenza'),
('Hypertension'),
('Diabetes'),
('Asthma');

-- Assuming PatientNumber 1 has Influenza (IllnessCode 1) and Hypertension (IllnessCode 2)
INSERT INTO PatientIllness (ConsultationID, IllnessCode) VALUES
((SELECT ConsultationID FROM Consultation WHERE PatientNumber = 1 LIMIT 1), 1),
((SELECT ConsultationID FROM Consultation WHERE PatientNumber = 1 LIMIT 1), 2);

-- Assuming PatientNumber 2 has Diabetes (IllnessCode 3)
INSERT INTO PatientIllness (ConsultationID, IllnessCode) VALUES
((SELECT ConsultationID FROM Consultation WHERE PatientNumber = 2 LIMIT 1), 3);


INSERT INTO InPatient (PatientNumber, DateOfAdmission, NursingUnit, AttendingNurse) VALUES
(1, '2023-11-01', 3, 5),  -- Patient 1 admitted on Nov 1, 2023, in Nursing Unit 3 with Attending Nurse 5
(2, '2023-11-02', 4, 6),  -- Patient 2 admitted on Nov 2, 2023, in Nursing Unit 4 with Attending Nurse 6
(3, '2023-11-03', 5, 7);  -- Patient 3 admitted on Nov 3, 2023, in Nursing Unit 5 with Attending Nurse 7

INSERT INTO Room (RoomNumber, BedNumber, Occupied, CurrentPatient) VALUES
('101A', 'A', TRUE, 1),   -- Room 101A, Bed A is occupied by InPatient 1
('101A', 'B', FALSE, NULL),-- Room 101A, Bed B is unoccupied
('102B', 'A', TRUE, 2),   -- Room 102B, Bed A is occupied by InPatient 2
('102B', 'B', FALSE, NULL),-- Room 102B, Bed B is unoccupied
('103C', 'A', FALSE, NULL),-- Room 103C, Bed A is unoccupied
('103C', 'B', FALSE, NULL);-- Room 103C, Bed B is unoccupied


