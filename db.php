<?php
	
	$i=1;
	$conn=mysqli_connect("localhost","root","","iot");
	$q="select * from menu";
	$res=mysqli_query($conn,$q);
	$rows=mysqli_num_rows($res);
	
	while($l=mysqli_fetch_assoc($res)){
		$t=$l['id'];
		$a["$t"]=$l['name'];
		$a["price"]["$t"]=$l['price'];
	}
	$a["rows"]=$rows;
	
	echo json_encode($a);
?>
