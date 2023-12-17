<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>View Staff by Job Type</title>
        <script>
        function handlePatientTypeChange() {
            var personnelType = document.getElementById("personnelType").value;
                    }
    </script>
</head>
<body>


<div id="main-wrapper">
    <?php
        include('navigation.php');
        ?>

    <div class="content-body">



 


        <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">

                                    <h2>View Staff Members</h2> <br>
                                    
                                <div id="personnelType">
                                    <form action="view_staff.php" method="post"> 
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="jobType">Select Job Type</label>
                                                <select name="jobType" id="jobType" class="form-control">
                                                    <?php include('populateJobType.php'); ?>
                                                </select><br>
                                            </div>

                                            
                                        </div>

                                        
                                        
                                        <div class="row justify-content-between">
                
                                            <div class="col-3"> </div>
                                            <div class="col-3">    
                                                <button class="btn btn-success btn" type="submit" class="btn btn-dark" value="View Staff">View Staff</button>

                                            </div>
                                        </div>
                                      

            
                                    </form>
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
    <script src="/NMA/bootstrap-theme/theme/plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="/NMA/bootstrap-theme/theme/plugins/sweetalert/js/sweetalert.init.js"></script>
</body>


<a href="Add_Personnel_form.php"><button>Add Personnel</button></a>
<a href='delete_personnel.php'><button>Delete Personnel</button></a>
<a href="index.php"><button>Return to Home Page</button></a>
</html>
