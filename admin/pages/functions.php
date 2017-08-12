<?php
function load_category($sid)
{
	$link=mysqli_connect("localhost","root","","blog-site");
	$output='';
	$query="select * from category where uid='$sid' order by cname";
	$result=mysqli_query($link,$query);
	while($row=mysqli_fetch_assoc($result))
	{
		$output.='<option value="'.$row['id'].'">'.strtoupper($row["cname"]).'</option>';
	}
	return $output;
}
?>