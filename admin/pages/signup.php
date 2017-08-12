<?php
error_reporting(0);
include_once("../db/db_config.php");
session_start();
if($sid=$_SESSION['id'])
{
  header('location:home.php');
}
if(isset($_POST['submit']))
{

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['pwd'];
    $dob=$_POST['dob'];
    $gen=$_POST['gender'];
    $img_name=$_FILES['fatt']['name'];
    $img_tmpname=$_FILES['fatt']['tmp_name'];
    if(move_uploaded_file($img_tmpname,"../user-pic/".$img_name))
    {
        $query="insert into registration (name,email,password,dob,gender,img) values ('$name','$email','$password','$dob','$gen','$img_name')";
        $result=mysqli_query($link,$query);
        if($result==1)
        {
             session_start();
            $_SESSION['email']=$email;
            $_SESSION['name']=$email;
            $_SESSION['pic']=$img_name;
 
            header('location:profile.php');
        }
        else
        {
            echo "error";
        }
    }
    else
    {
        echo "erroring in uploading";
    }
    
}
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
<br/><br/><br/><br/>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class=" panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title txt-center">Please sign up for Blogger Site !</h3>
                    </div>
                    <div class="panel-body">
                    <form method="post"  enctype="multipart/form-data" >
                      <div class="row">
                      <div class="form-group">
                          <div class="col-md-2 col-md-offset-1">
                              <label for="name">Name</label>
                          </div>
                          <div class="col-md-6">
                              <input type="text" name="name" class="form-control" placeholder="Name" autofocus>
                          </div>
                        </div>
                      </div> 
                      <br/>
                      <div class="row">
                      <div class="form-group">
                          <div class="col-md-2 col-md-offset-1">
                              <label for="name">Email</label>
                          </div>
                          <div class="col-md-6">
                              <input type="text" name="email" id="email" class="form-control" placeholder="email" onblur="email_check()">
                              <span id="email-availability-status"></span>
                          </div>
                        </div>
                      </div>
                      <br/>
                      <div class="row">
                      <div class="form-group">
                          <div class="col-md-2 col-md-offset-1">
                              <label for="name">Password</label>
                          </div>
                          <div class="col-md-6">
                              <input type="Password" name="pwd" class="form-control" placeholder="Password">
                          </div>
                        </div>
                      </div>
                      <br/>
                      <div class="row">
                      <div class="form-group">
                          <div class="col-md-2 col-md-offset-1">
                              <label for="name">Date of Birth</label>
                          </div>
                          <div class="col-md-6">
                              <input type="date" name="dob" class="form-control">
                          </div>
                        </div>
                      </div>
                      <br/>
                      <div class="row">
                      <div class="form-group">
                          <div class="col-md-2 col-md-offset-1">
                              <label for="name">Gender</label>
                          </div>
                          <div class="col-md-6">
                              <input type="radio" name="gender" value="male" class="">Male
                              <input type="radio" name="gender" value="female">Female
                          </div>
                        </div>
                      </div>
                      <br/>
                      <div class="row">
                      <div class="form-group">
                          <div class="col-md-2 col-md-offset-1">
                              <label for="name">Profile Pic</label>
                          </div>
                          <div class="col-md-6">
                              <input type="file" name="fatt" id="fatt" class="form-control">
                          </div>
                        </div>
                      </div>
                      <br/>
                      <div class="row">
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                              <input type="submit" name="submit" class="btn btn-lg btn-success btn-block">
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
    <script type="text/javascript">
      function email_check() {
//$("#loaderIcon").hide();
jQuery.ajax({
url: "availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#email-availability-status").html(data);

},
error:function (){
}
});
}
</script>
</body>
</html>
