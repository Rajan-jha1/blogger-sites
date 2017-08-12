<?php
include_once("../db/db_config.php");
session_start();
$sess=$_SESSION['email'];
$query="select * from registration where email='$sess'";
$result=mysqli_query($link,$query);
$row=mysqli_fetch_assoc($result);
//print_r($row);

  $id=$row['id'];
  $name=$row['name'];
  $pic=$row['img'];
  $_SESSION['id']=$id;
  $_SESSION['name']=$name;
  $_SESSION['pic']=$pic;
  $sid=$_SESSION['id'];
  $sname=$_SESSION['name'];
  $spic=$_SESSION['pic'];

///insert category in database
if(isset($_POST['submit']))
{
    echo $udi=$row['id'];
    echo $cname=$_POST['cname'];
    echo $cdate=$_POST['cdate'];
    $query1="INSERT INTO category (cname,creation, uid) VALUES ('$cname','$cdate','$udi');";
    $result1=mysqli_query($link,$query1);
    if($result1==1)
    {
        echo "<script>alert('Course Added Successfully')</script>";
    }
    else
    {
       echo "<script>alert('error')</script>"; 
    }
  }

?>

<?php include_once('header.php'); ?>
    <div id="wrapper">
    <?php include_once('leftbar.php'); ?>

        <!-- Navigation -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome <?php echo ucfirst($sname); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                <div class="panel-heading">Add Course</div>
                <div class="panel-body">
                <form method="post">
                   <div class="row">
                   <div class="form-group">
                       <div class="col-md-4">
                           <label>Category Name</label>
                       </div>
                       <div class="col-md-8">
                           <input type="text" name="cname" id="cname" class="form-control">
                       </div>
                   </div> 
                </div>
                <br/>
                <div class="row">
                   <div class="form-group">
                       <div class="col-md-4">
                           <label>Creation Date</label>
                       </div>
                       <div class="col-md-8">
                          <input class="form-control" value="<?php echo date('d-m-Y');?>" readonly="readonly" name="cdate">
                       </div>
                   </div> 
                </div>
                <br/>
                <div class="row">
                <div class="form-group">
                <div class="col-md-6 col-md-offset-5">
                      <input type="submit" name="submit" value="Create Course" id="sbt" class="btn btn-success">
                </div>
                </div>
                </div>
                </form>
                </div>
                 </div>
                    </div>
                    </div>
                </div>
            </div>

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include_once('footer.php'); ?>
