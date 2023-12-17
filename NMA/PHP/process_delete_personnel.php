<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/NMA/bootstrap-theme/theme/css/style.css">
    <title>Success</title>


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

            <div id="room-data">
                
            <?php
                include('session.php'); // Ensure this is the correct path to your session file

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $personnelID = $_POST['id'];

                    // SQL query to delete personnel
                    $sql = "DELETE FROM Personnel WHERE EmploymentNumber = ?";
                    $stmt = $conn->prepare($sql);

                    if ($stmt === false) {
                        die("Error preparing the query: " . $conn->error);
                    }

                    $stmt->bind_param("i", $personnelID);

                    if ($stmt->execute()) {
                        echo "<p>Personnel deleted successfully.</p>";
                    } else {
                        echo "<p>Error deleting personnel: " . $stmt->error . "</p>";
                    }

                    $stmt->close();
                }

                
                $conn->close();

                ?>
            </div>
            

            <div class="row justify-content-between">
                
                <div class="col-1"> </div>
                <div class="col-6">    
                    <a href="delete_personnel.php"><button type="button" class="btn mb-1 btn-primary">Delete Another Personnel</button></a>
                    <a href="Personnel.php"><button type="button" class="btn mb-1 btn-primary">Return to View Staff</button></a>
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
