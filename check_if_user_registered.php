<?php
	include "db.php";
	if(isset($_POST['username']))
	{
		$username = $_POST['username'];
		$sql = "SELECT * FROM `user` WHERE `username` LIKE '" . $username ."' AND user_status LIKE 'registered' ;";
		$select = mysqli_query($con,$sql);
		$numrows = mysqli_num_rows($select);
		if ($numrows > 0)
			echo "user_registered_true";
		else
			echo "user_registered_false";

		mysqli_close($con);
	}
 ?>