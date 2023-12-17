<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>Choose Personnel To Remove</title>
        <script>
        function handlePatientTypeChange() {
            var personnelID = document.getElementById("personnelID").value;
                    }
    </script>
</head>
<body>

<div id="main-wrapper">
    <?php
    include('navigation.php');
    ?>

    <div class="content-body">
        <div class="col-lg-12 container-fluid">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Delete Personnel</h4>
                    <div class="basic-form" id="personnelID">
                        <form action="process_delete_personnel.php" method="post"> 

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="id">Select Employee To Delete:</label>
                                    <select name="id" id="id" class="form-control">
                                        <?php include('populate_personnel.php'); ?>
                                </select><br>
                                </div>

                            </div>

                            <div class="row justify-content-between">
            
                                <div class="col-3"> </div>
                                <div class="col-3">    
                                    <button class="btn btn-success btn" type="submit" class="btn btn-dark" value="Delete">Delete</button>
                            
                                </div>
                            </div>
                            
                            
                        
                            

                        </form>
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

<a href="index.php"><button>Return to Home Page</button></a>
</html>
