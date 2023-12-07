<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Previous Diagnoses and Illnesses</title>
        <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            margin-bottom: 30px; /* Adds space between tables */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table-title {
            text-align: left;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
        button {
            margin-top: 20px;
            display: block;
            width: 200px;
            padding: 10px;
            font-size: 16px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <!-- Optional: Include CSS for styling -->
</head>
<body>
    <h1>Patient Diagnoses and Illnesses</h1>
    <div id="patient-data">
        <div class="table-title">Illnesses</div>
        <?php include('get_patient_Illnesses.php'); ?>
        <div class="table-title">Allergies</div>
        <?php include('get_patient_Allergies.php'); ?>
    </div>
    <a href="index.php"><button>Return to Home Page</button></a>
</body>
</html>