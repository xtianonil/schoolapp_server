<?php
	if (	isset($_POST['userid'])	&&
			isset($_POST['lname']) 	&&
		 	isset($_POST['fname']) 	&&
		 	isset($_POST['mname']) 	&&
		 	isset($_POST['email']) 	
	 	)
	{
		include "db.php";
		$sql = "UPDATE User SET lname ='"   	. mysqli_real_escape_string($con,$_POST['lname']) 	. "', " .
							   "fname ='"		. mysqli_real_escape_string($con,$_POST['fname']) 	. "', " .
							   "mname ='"		. mysqli_real_escape_string($con,$_POST['mname']) 	. "', " .
							   "email ='"		. mysqli_real_escape_string($con,$_POST['email'])		. "' " .
							"WHERE user_id =" . $_POST['userid'] . ";";
		//echo $sql;
		$query_update = mysqli_query($con,$sql);
		echo $query_update;
		mysqli_close($con);
	}
?>