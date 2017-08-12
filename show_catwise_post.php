<?php
include_once('db.php');
if(!empty($_POST["id"]))
{
	$cval=$_POST['id'];
	$query="SELECT *, post.id,registration.name,registration.img FROM post INNER JOIN registration ON post.uid=registration.id  where post.category='$cval' order by creation  limit 4 ";
	$result=mysqli_query($link,$query);
	while($row=mysqli_fetch_assoc($result))
		
	{ ?>
		<div class="post-preview">
                    
                        <h2 class="post-title">
                           <?php echo ucfirst($row['title']);?>
                        </h2>
                        <p class="post-subtitle"><img src="admin/post-pic/<?php echo $row['image'] ?>" class="img-responsive img-thumbnail" width="250" align="left" vspace="5" hspace="10">
                           <?php echo substr(ucfirst($row['description']),0,700);?> <a href="post.php?id=<?php echo $row['id'];?>">Read More>></a>
                        </p>
                    <p class="post-meta">Posted by <img src="admin/user-pic/<?php echo $row['img']; ?>" class="img-circle" alt="Cinque Terre" width="80" height="80" > <a href="#"><?php echo $row['name'];?></a> on <?php echo $row['creation']; ?>
                       
                    </p>
                </div>
                <hr>
                <?php } ?>

<?php } ?>
<?php
include_once('db.php');
if(!empty($_POST["id1"]))
{
    $cval=$_POST['id1'];
    $query="SELECT *, post.id,registration.name,registration.img FROM post INNER JOIN registration ON post.uid=registration.id  where post.id='$cval' order by creation  limit 4 ";
    $result=mysqli_query($link,$query);
    while($row=mysqli_fetch_assoc($result))
        
    { ?>
        <div class="post-preview">
                    
                        <h2 class="post-title">
                           <?php echo ucfirst($row['title']);?>
                        </h2>
                        <p class="post-subtitle"><img src="admin/post-pic/<?php echo $row['image'] ?>" class="img-responsive img-thumbnail" width="250" align="left" vspace="5" hspace="10">
                           <?php echo substr(ucfirst($row['description']),0,700);?> <a href="post.php?id=<?php echo $row['id'];?>">Read More>></a>
                        </p>
                    
                    <p class="post-meta">Posted by <img src="admin/user-pic/<?php echo $row['img']; ?>" class="img-circle" alt="Cinque Terre" width="80" height="80" > <a href="#"><?php echo $row['name'];?></a> on <?php echo $row['creation']; ?>
                       
                    </p>
                </div>
                <hr>
                <?php } ?>

<?php } ?>
