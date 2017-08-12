<?php
include_once('../db/db_config.php');
$id = $_POST['id'];
$query="select image from post where id='$id'";
$result=mysqli_query($link,$query);
$row=mysqli_fetch_assoc($result);
$name=$row['image'];
if($query="delete from post where id='$id'")
{
	unlink("../post-pic/" . $name);
	$result=mysqli_query($link,$query);
}

$id1 = $_POST['id'];
$query="delete from category where id='$id1'";
$result=mysqli_query($link,$query);


?>