<?php
   include('session.php');
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Newark Medical Associates</title>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">


<style>
        
        .landing-page {
            background-image: url("/NMA/images/landing.png");
            background-repeat: no-repeat;
            background-size:cover;
        }
        
    </style>


</head>

<body>

<div class="landing-page">
 <div id="main-wrapper">
    
    <?php
        include('navigation.php');
        ?>

 
    <div class="content-body">


        
        <div class="container-fluid mt-3">
            <div class="row">

                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Patients Admitted</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">
                                <?php
                                    include('session.php');

                                    $sql = "SELECT count(*) AS ct
                                    FROM InPatient i
                                    INNER JOIN Patient p on i.PatientNumber = p.PatientNumber;";
                                    $result = $conn->query($sql);
                                    
                                    while ($row = $result->fetch_assoc()) {
                                        echo $row['ct'];
                                        
                                    }

                                    $conn->close();
                                    ?>
                                    </h2>
                                
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>  <!-- End widget 1 -->


              <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Overall Patients</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">
                                <?php
                                    include('session.php');

                                    $sql = "SELECT count(*) AS ct
                                    FROM Patient ";
                                    $result = $conn->query($sql);
                                    
                                    while ($row = $result->fetch_assoc()) {
                                        echo $row['ct'];
                                        
                                    }

                                    $conn->close();
                                    ?>
                                    </h2>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>

                <!-- End widget 2 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">Consultations Today</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">
                                <?php
                                    include('session.php');

                                    $sql = "Select count(*) as ct from consultation con where DATE_FORMAT(con.ConsultationDateTime,'%m/%d/%Y') = DATE_FORMAT(SYSDATE(),'%m/%d/%Y');";
                                    $result = $conn->query($sql);
                                    
                                    while ($row = $result->fetch_assoc()) {
                                        echo $row['ct'];
                                        
                                    }

                                    $conn->close();
                                    ?>


                                </h2>
                                <p class="text-white mb-0"><?php
                                        include('session.php');

                                        $sql = "Select distinct DATE_FORMAT(con.ConsultationDateTime,'%W %M %d') as ct from consultation con where DATE_FORMAT(con.ConsultationDateTime,'%m/%d/%Y') = DATE_FORMAT(SYSDATE(),'%m/%d/%Y');";
                                        $result = $conn->query($sql);
                                        
                                        while ($row = $result->fetch_assoc()) {
                                            echo $row['ct'];
                                            
                                        }

                                        $conn->close();
                                        ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                        </div>
                    </div>
                </div>

                <!-- End widget 3 -->
                

              <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-5">
                        <div class="card-body">
                            <h3 class="card-title text-white">Overall Doctor Visits</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">
                                <?php
                                    include('session.php');

                                    $sql = "SELECT count(*) AS ct
                                    FROM Consultation ";
                                    $result = $conn->query($sql);
                                    
                                    while ($row = $result->fetch_assoc()) {
                                        echo $row['ct'];
                                        
                                    }

                                    $conn->close();
                                    ?>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                        </div>
                    </div>
                </div>

                <!-- End widget 4 -->
            </div>
        </div>

        </div>

        
    
    </div>

</div>

    <script>
        function showTab(tabName) {
            var tabs = document.getElementsByClassName('tab');
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].style.display = 'none';
            }
            document.getElementById(tabName).style.display = 'block';
        }

        function showSubTab(tabName) {
            var subTabs = document.getElementsByClassName('sub-tab');
            for (var i = 0; i < subTabs.length; i++) {
                subTabs[i].style.display = 'none';
            }
            document.getElementById(tabName).style.display = 'block';
        }

        
    </script>
    <script src="/NMA/bootstrap-theme/theme/plugins/common/common.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/custom.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/settings.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/gleek.js"></script>
    <script src="/NMA/bootstrap-theme/theme/js/styleSwitcher.js"></script>
</body>


</html>
