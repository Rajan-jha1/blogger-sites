<?php
include_once('db.php');
$query="SELECT *, post.id,registration.name,registration.img FROM post INNER JOIN registration ON post.uid=registration.id order by creation  limit 4";
$result=mysqli_query($link,$query);

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
        <div class="well cat-list">
<h4>Blog Categories</h4>
<ul class="list-unstyled" id="cat">
 <?php $j=0;
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

            <?php 
    while($row=mysqli_fetch_assoc($result))
    {?>
                <div class="post-preview">
                    
                        <h2 class="post-title">
                           <?php echo ucfirst($row['title']);?>
                        </h2>
                        <p class="post-subtitle"><img src="admin/post-pic/<?php echo $row['image'] ?>" class="img-responsive img-thumbnail" width="250" align="left" vspace="5" hspace="10">
                           <?php echo substr(ucfirst($row['description']),0,700);?> <a href="post.php?id=<?php echo $row['id'];?>" class="post-preview read-more-button">Read more>></a>

                        </p>
                    <p class="post-meta">Posted by <img src="admin/user-pic/<?php echo $row['img']; ?>" class="img-circle" alt="Cinque Terre" width="80" height="80" > <a href="#"><?php echo $row['name'];?></a> on <?php echo $row['creation']; ?>
                       
                    </p>
                </div>
                <hr>
    <?php } ?>
</div>
    </div>
</div>
<!--ends here-->
<?php include_once('footer.php'); ?>
