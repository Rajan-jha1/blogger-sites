<?php
include_once("../db/db_config.php");
if(isset($_POST['submit']))
{
   $email=$_POST['email'];
   $password=$_POST['password'];
   $query="select * from registration where email='$email' and password='$password'";
   $result=mysqli_query($link,$query);
   $row=mysqli_num_rows($result);
   if($row>0)
   {
        session_start();
        $_SESSION['email']=$email;
        header('location:home.php');
   }
   else
   {
       $error_msg="Invalid Username or Password";
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

    <title>Student Managment-login</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../dist/css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        .error_message
        {
          color:red;
          font-size: 18px;
        padding-left: 55px;              
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In Here !</h3>
                    </div>
                   <span class="error_message"><?php echo @$error_msg;?></span>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me &nbsp;&nbsp;&nbsp;&nbsp;

                                         <a href="forget_password.php" style="font-size: 15px;text-decoration: none; ">Forget Password</a>
                                    </label>
                                </div>
                                <p style="padding-top:10px;"><a href="signup.php">Need an account?</a></p>
                                <input type="submit" value="Login" name="submit" class="btn btn-lg btn-success btn-block">
                            </fieldset>

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
