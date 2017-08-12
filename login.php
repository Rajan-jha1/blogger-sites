<?php
include_once("db.php");
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
        header('location:post.php');
   }
   else
   {
       $error_msg="Invalid Username or Password";
   }

}

?>
<?php 
include_once('header.php');
include_once('sidebar.php');
?>

    <header class="intro-header" style="background-image: url('img/home-bg.jpg') ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1 class=" animated slideInRight">Clean Blog</h1>
                        <hr class="small animated shake">
                        <span class="subheading animated slideInLeft">A Clean Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
<!--main content area-->
<div class="container-fluid">
<div class="row">
    <div class="col-lg-3">
        <div class="well">
<h4>Blog Categories</h4>
<ul class="list-unstyled" id="cat">
 <?php 
    while($ro=mysqli_fetch_assoc($r))
    {?>
    <li><a href="#" id="<?php echo $ro['id'];?>" class="cat"><?php echo ucfirst($ro['cname']);?></a>    (<?php echo $no;?>)
    </li>
    <?php } ?>
     </ul>
     <hr>
     <h4>Recent Post</h4>
     <ul class="list-unstyled" id="cat">
     <?php 
    foreach ($result1 as $value) 
    {?>
    <li><a href="#" id="<?php echo $value['id'];?>" class="post"><?php echo ucfirst($value['title']);?></a>
    </li>
    <?php } ?>
     </ul>
     <hr>
     <h4>Recent Comments</h4>
<ul class="list-unstyled">
    <li><a href="#">Category Name</a>
    </li>
    <li><a href="#">Category Name</a>
    </li>
    <li><a href="#">Category Name</a>
    </li>
     <li><a href="#">Category Name</a>
     </li>
     </ul>
</div>

    </div>
    <div class="col-lg-9" style="text-align: justify;" id="post_cat">
        <div class="row">
        <h3 style=" padding-left:94px;color: green;">You have to login first before post comment!</h3>
            <div class="col-md-7 col-md-offset-1">
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
</div>
    </div>
</div>
<!--ends here-->
<?php include_once('footer.php'); ?>
