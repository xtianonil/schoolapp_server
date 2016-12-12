<?php
	include "db.php";
	if ( isset($_POST['username']) && isset($_POST['regid']) )
	{
		$sql = "UPDATE user SET user_status = 'registered', reg_id = '" . $_POST['regid'] ."' " .
							" WHERE username LIKE '" . $_POST['username'] . "';";
		//echo $sql;
		$query_update = mysqli_query($con,$sql);
		echo $query_update;
		mysqli_close($con);
	}
?>