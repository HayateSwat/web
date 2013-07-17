<?php
	$xs = $_POST['x'];
	$ys = $_POST['y'];

	$con = mysqli_connect("127.0.0.1","root","1111","test");
	
	$result = mysqli_query($con,"INSERT INTO `insert`(id, lng, lat) VALUES (3,'{$xs}','{$_POST['y']}')");
	
	mysqli_close($con);
	
	
	/*
	$chk = false;
	$chkid = false;
	
	while($row = mysqli_fetch_array($result))
	{
		$chkid = true;
	   if($pass == $row['password']){
			echo 0;
			$chk = true;
			break;}
	}
	if($chkid){
		if(!$chk)
			echo 2;
	}
	else
		echo 1;
	*/
	


	

	
?>

