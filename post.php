<?php
include_once('db.php');
$query="SELECT *, post.id,registration.name,registration.img FROM post INNER JOIN registration ON post.uid=registration.id order by creation  limit 4";
$result=mysqli_query($link,$query);

$q="select * from category";
$r=mysqli_query($link,$q);

$q1="select * id, title from post order by creation limit 4";
$result1=mysqli_query($link,$query);
$id=$_GET['id'];
$query="SELECT *, post.id,registration.name,registration.img FROM post INNER JOIN registration ON post.uid=registration.id where post.id='$id'";
$result=mysqli_query($link,$query);
$row=mysqli_fetch_assoc($result);
$q="select * from category";
$r=mysqli_query($link,$q);
$count_post="SELECT COUNT(post.category) as count FROM post RIGHT JOIN category ON post.category=category.id GROUP BY category.id";
$count_res=mysqli_query($link,$count_post);
$countid = array();
$i = 0;
while($row1=mysqli_fetch_array($count_res)){
    $countid[$i++] = $row1['count'];
}
$row1=mysqli_fetch_array($count_res);
if(isset($_POST['post_comment']))
{
    $login_id = 0;
    if($login_id){

        @$id=$_GET['id'];
        @$name=$_POST['name'];
        @$email=$_POST['email'];
        @$comments=$_POST['comments'];
        $query="insert into comments(name,email,comments,post_id) values('$name','$email','$comments','$id')";
        $result=mysqli_query($link,$query);
    }else{?>
    

<!DOCTYPE html>
<html>
<head>
<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
</head>
<body>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
    <?php }
}
$c="select * from comments where post_id='$id'";
$re=mysqli_query($link,$c);
?>
<?php 
include_once('header.php');
include_once('sidebar.php');
?>
<header class="intro-header" style="background-image: url('admin/post-pic/<?php echo $row['image']; ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                    <div class="post-heading">
                        <h1 class=" animated slideInRight"><?php echo $row['title'];?></h1>
                        <h2 class="subheading animated slideInLeft">Problems look mighty small from 150 miles up</h2>
                        <span class="meta animated pulse ">Posted by <a href="#"><?php echo $row['name'];?></a> on <?php echo $row['creation']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

<!--main content area-->
<div class="container-fluid">
<div class="row">
 <div class="col-lg-3">
        <div class="well cat-list">
<h4>Blog Categories</h4>
<ul class="list-unstyled" id="cat">
 <?php $j = 0;
    while($ro=mysqli_fetch_assoc($r))
    {?>
    <li><a href="#" id="<?php echo $ro['id'];?>" class="cat"><?php echo ucfirst($ro['cname']);?></a> <span class="badge"><?php echo $countid[$j++];?></span> 
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
                    <h2><?php echo ucfirst($row['title']);?></h2>
                    <p style="font-family:Arial, Helvetica, sans-serif;text-align: justify;"><?php echo $row['description'];?></p>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <textarea name="comments" id="msg" class="form-control" rows="3" placeholder="Please enter your Comments."></textarea>
                        </div>
                        <button type="submit" name="post_comment" id="myBtn" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                        
                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                  <?php
                while($res1=mysqli_fetch_assoc($re))
                { 
                    $comt_time=$res1['date'];
                    
                ?>
                <div class="media">              
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $res1['name'];?>
                            <small><?php echo $comt_time ?>
</small>
                        </h4>
                        <?php echo $res1['comments'];?>
                    </div>
                    
                </div>
                <div class="space"></div>
                    <div id="flash"></div>
                    <div id="show"></div>
                        <?php } ?>
                        <br/>
        
</div>
    </div>
    </div>
</div>
<!--ends here-->
<?php include_once('footer.php'); ?>
