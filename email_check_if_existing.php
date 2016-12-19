<?php
	if ( isset($_POST["email"]) )
	{
		include "db.php";
		$sql = "SELECT * FROM `user` WHERE `email` LIKE '" . mysqli_escape_string($con,$_POST["email"]) ."'";
		$select = mysqli_query($con,$sql);
		$numrows = mysqli_num_rows($select);
		if ($numrows > 0)
			echo "email_exists";
		else
			echo "email_available";
	}
?>