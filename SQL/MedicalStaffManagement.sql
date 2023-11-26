--Add/Remove a Staff Member

	-- Add
	INSERT INTO Personnel (Name, Gender, Address, TelephoneNumber, Salary) VALUES
	('Anne Taylor', 'F', '202 Main St', '555-2020', 55000);

	-- Remove
	DELETE FROM Personnel
	WHERE EmploymentNumber = 6;

-- View Staff Member per Job Type

SELECT * FROM Personnel
WHERE Role = 'Nurse';

--Schedule Job Shift

-- Assuming there is a JobShift table to manage work shifts
-- Schedule a new shift
INSERT INTO JobShift (PersonnelNumber, ShiftDate, ShiftStart, ShiftEnd) VALUES
(4, '2023-12-01', '08:00:00', '16:00:00');


SELECT p.Name, js.ShiftDate, js.ShiftStart, js.ShiftEnd
FROM JobShift js
JOIN Personnel p ON js.EmploymentNumber = p.EmploymentNumber
WHERE js.ShiftDate = '2023-12-01';

