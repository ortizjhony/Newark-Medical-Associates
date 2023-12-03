-- 1. Add/Remove a Staff Member

	-- Add
	INSERT INTO Personnel (Name, Gender, Address, TelephoneNumber, Salary) VALUES
	('Anne Taylor', 'F', '202 Main St', '555-2020', 55000);

	-- Remove
	DELETE FROM Personnel
	WHERE EmploymentNumber = 6;

-- 2. View Staff Member per Job Type

SELECT Role, count(*) FROM Personnel GROUP BY Role;
SELECT * FROM Personnel
WHERE Role = 'Nurse';

-- 3. Schedule Job Shift
	-- Add Job Shift
		INSERT INTO JobShift (EmploymentNumber, ShiftDate, ShiftStart, ShiftEnd) VALUES
		(4, '2023-12-01', '08:00:00', '16:00:00');

	-- See Schedule
	SELECT p.Name, js.ShiftDate, js.ShiftStart, js.ShiftEnd
	FROM JobShift js
	JOIN Personnel p ON js.EmploymentNumber = p.EmploymentNumber
	WHERE js.ShiftDate = '2023-12-01';
    
    -- Remove a Job Shift
    DELETE FROM JobShift 
	WHERE JobShiftID = 6;


