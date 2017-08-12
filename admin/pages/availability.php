<?php 
include_once('../db/db_config.php');
if(!empty($_POST["email"])) 
{
$email=$_POST['email'];
$query="select * from registration where email='$email'";
$result=mysqli_query($link,$query);
$row=mysqli_fetch_assoc($result);
if($email== $row['email'])
{
	echo "<span style='color:red'> Email already taken, please try another .</span>";
}
else
{
	echo "<span style='color:green'> You can Proceed .</span>";
}
}
?>