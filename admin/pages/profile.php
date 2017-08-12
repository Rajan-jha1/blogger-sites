<?php
session_start();
$sess=$_SESSION['email'];
include_once("../db/db_config.php");
$query="select * from registration where email='$sess'";
$result=mysqli_query($link,$query);
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../dist/css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="container">
<br/><br/>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class=" panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title txt-center">User profile !</h3>
                    </div>
                    <div class="panel-body">
                    <form method="post"  enctype="multipart/form-data" >
                    <div class="row">
                    	<div class="col-md-6 col-md-offset-3">
                    	<img src="../user-pic/<?php echo $row['img'];?>" class="img-circle" alt="Cinque Terre" width="304" height="236" >
                    	</div>
                    </div>
                    <br/>
                      <div class="row">
                      <div class="form-group">
                          <div class="col-md-2 col-md-offset-4">
                              <label for="name">Name</label>
                          </div>
                          <div class="col-md-6">
                              <?php echo $row['name'];?>
                          </div>
                        </div>
                      </div> 
                      <br/>
                      <div class="row">
                      <div class="form-group">
                          <div class="col-md-2 col-md-offset-4">
                              <label for="name">Email</label>
                          </div>
                          <div class="col-md-6">
                              <?php echo $row['email'];?>
                          </div>
                        </div>
                      </div>
                      <br/>
                      <div class="row">
                      <div class="form-group">
                          <div class="col-md-2 col-md-offset-4">
                              <label for="name">Password</label>
                          </div>
                           <div class="col-md-6">
                          <?php echo $row['password'];?>
                          </div>
                          </div>
                        </div>
                      </div>
               
                      <div class="row">
                      <div class="form-group">
                          <div class="col-md-2 col-md-offset-4">
                              <label for="name">Date of Birth</label>
                          </div>
                          <div class="col-md-6">
                              <?php echo $row['dob'];?>
                          </div>
                        </div>
                      </div>
                      <br/>
                      <div class="row">
                      <div class="form-group">
                          <div class="col-md-2 col-md-offset-4">
                              <label for="name">Gender</label>
                          </div>
                          <div class="col-md-6">
                             <?php echo $row['gender'];?>
                          </div>
                        </div>
                      </div>
                      <br/>
                      <div class="row">
                      <div class="form-group">
                          <div class="col-md-6 btn-padding1 ">
                              <input type="submit" name="submit" class="btn btn-lg btn-success" value="Next to add post">
                          </div>
                          <div class="col-md-6 col btn-padding">
                         
                          	 <a href="home.php" class="btn btn-lg btn-success">Next to add post >></a>
                          </div>
                        </div>
                      </div>
                      <br/>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
