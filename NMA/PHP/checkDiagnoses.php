<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
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

<div id="main-wrapper">
    
<?php
        include('navigation.php');
        ?>
<div class="content-body">
    <div class="container-fluid">

            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h1>Patient Diagnoses and Illnesses</h1><br>
                                <div id="patient-data">
                                    <div class="table-title">Illnesses</div> <br>
                                    <?php include('get_patient_Illnesses.php'); ?>
                                    <div class="table-title">Allergies</div><br>
                                    <?php include('get_patient_Allergies.php'); ?>
                                </div>
                                <div class="row justify-content-between">
                
                                    <div class="col-3"> </div>
                                    <div class="col-3">    
                                        <a href="index.php"><button type="button" class="btn mb-1 btn-primary">Return to Home Page</button></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/NMA/bootstrap-theme/theme/plugins/common/common.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/custom.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/settings.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/gleek.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/styleSwitcher.js"></script>
</body>
</html>