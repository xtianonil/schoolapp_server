<?php
	include "db.php";
	if ( isset($_POST['username']) && isset($_POST['verif_code']) )
	{
		$username = $_POST['username'];
		$verif_code = $_POST['verif_code'];
		$sql = "SELECT * FROM `user` WHERE `username` LIKE '" . $username ."' AND `verif_code` LIKE '" . $verif_code . "';";
		$select = mysqli_query($con,$sql);
		$numrows = mysqli_num_rows($select);
		if ($numrows > 0)
			echo "verif_code_true";
		else
			echo "verif_code_false";

		mysqli_close($con);
	}
 ?>