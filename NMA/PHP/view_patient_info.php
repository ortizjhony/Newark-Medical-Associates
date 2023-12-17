<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>View Patient Information</title>
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
                                

            <h1>Patient Information</h1>
            <div id="patient-data">
                <?php include('get_patient_info.php'); ?>
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
    <script src="/NMA/bootstrap-theme/theme/plugins/common/common.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/custom.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/settings.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/gleek.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/styleSwitcher.js"></script>
</body>
</html>
