<?php
	include "db.php";
	if(isset($_POST['username']))
	{
		$username = $_POST['username'];
		$sql = "SELECT * FROM `user` WHERE `username` LIKE '" . $username ."'";
		$select = mysqli_query($con,$sql);
		$numrows = mysqli_num_rows($select);
		if ($numrows > 0)
			echo "username_exists";
		else
			echo "username_available";

		mysqli_close($con);
	}
 ?>