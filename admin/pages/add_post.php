<?php 
include_once('../db/db_config.php');
include_once('functions.php');
  session_start();
  $sid=$_SESSION['id'];
  $sname=$_SESSION['name'];
  $spic=$_SESSION['pic'];

  if(isset($_POST['submit']))
  {
    //$uid=$si
    $cat=$_POST['cat_name'];
    $tilte=$_POST['tilte'];
    $des=$_POST['description'];
    $cdate=$_POST['cdate'];
    $img_name=$_FILES['fatt']['name'];
    $img_tmpname=$_FILES['fatt']['tmp_name'];
    if(move_uploaded_file($img_tmpname,"../post-pic/".$img_name))
    {
      $query="insert into post (uid,title,description,category,creation,image) values('$sid','$tilte','$des','$cat','$cdate','$img_name')";
      $result=mysqli_query($link,$query);
      if($result==1)
      {
        echo "<script>alert('Post Added Successfully')</script>";
      }
      else
      {
        echo "<script>alert(' Something Error to Post Added ')</script>";
      }
    }
    else
    {
      echo "<script>alert('Something Error in uploading image')</script>";
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
                <div class="panel-heading">Add Post</div>
                <div class="panel-body">
                <form method="post"  enctype="multipart/form-data">
                   <div class="row">
                   <div class="form-group">
                       <div class="col-md-4">
                           <label>Select Category</label>
                       </div>
                       <div class="col-md-8">
                            <select name="cat_name" id="cat_name" class="form-control">
              <option value="">SELECT</option>
                <?php echo load_category($sid);?>
              </select>
                       </div>
                   </div> 
                </div>
                <br/>
                <div class="row">
                   <div class="form-group">
                       <div class="col-md-4">
                           <label>Post Title</label>
                       </div>
                       <div class="col-md-8">
                        <input type="text" name="tilte" id="title" class="form-control">
                       </div>
                   </div> 
                </div>
                <br/>
                <div class="row">
                   <div class="form-group">
                       <div class="col-md-4">
                           <label>Post Description</label>
                       </div>
                       <div class="col-md-8">
                          <textarea name="description" class="form-control">
                            
                          </textarea>
                       </div>
                   </div> 
                </div>
                <br/>
                <div class="row">
                   <div class="form-group">
                       <div class="col-md-4">
                           <label>Post Image</label>
                       </div>
                       <div class="col-md-8">
                          <input type="file" name="fatt" id="fatt" class="form-control">
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
