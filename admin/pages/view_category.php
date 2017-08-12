<?php
include_once('../db/db_config.php');
session_start();
/*$sess=$_SESSION['email'];
$query="select * from registration where email='$sess'";
$result=mysqli_query($link,$query);
$row=mysqli_fetch_assoc($result);
$uid=$row['id'];
$row=mysqli_fetch_assoc($result);*/
$sid=$_SESSION['id'];
$sname=$_SESSION['name'];
$spic=$_SESSION['pic'];
$query="select * from category where uid='$sid'";
$result=mysqli_query($link,$query);
$sno=1;
?>
<?php include_once('header.php');?>
    <div id="wrapper">
<?php include('leftbar.php');?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Welcome <?php echo Ucfirst($sname);?></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            View Category
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Ctaegory Name</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                 <?php 
                                 while($row=mysqli_fetch_assoc($result))
                                 	{?>
                                    <tr class="odd<?php echo $row['id']; ?>">
                                        <td><?php echo $sno++;?></td>
                                        <td><?php echo strtoupper($row['cname']);?></td>
                                        <td><?php echo strtoupper($row['creation']);?></td>
                                        <td >
                                        <a href="edit-course.php?cid=<?php echo $row['id']?>"><p class="fa fa-edit"></p></a> &nbsp;&nbsp;

                                        <span class="action"><a href="#" id="<?php echo $row['id']; ?>" class="delete" title="Delete"><p class="fa fa-times-circle" style="color:red;"></p></a></span>

                                        </td>
                                    </tr>
                                    <?php }
                                    ?>
                              
                                </tbody>

                                </table>
                            <!-- /.table-responsive -->
                <!-- /.col-lg-6 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include_once('footer.php');?>
