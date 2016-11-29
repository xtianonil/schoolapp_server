<?php
	include "db.php";
	if ( isset($_POST['username']) )
	{
		$sql = "UPDATE user SET user_status = 'registered' " .
							"WHERE username LIKE '" . $_POST['username'] . "';";
		//echo $sql;
		$query_update = mysqli_query($con,$sql);
		echo $query_update;
		mysqli_close($con);
	}
?>