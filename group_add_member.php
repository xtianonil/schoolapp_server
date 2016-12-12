<?php
	
	if ( isset($_POST['userid']) &&
		 isset($_POST['groupid']) 
	 	)
	{
		include "db.php";
		$sql = "INSERT INTO group_membership (user_id, group_id, membership_status)
				VALUES ( '" . mysql_real_escape_string($_POST["userid"]) 		. "'," .
						"'" . mysql_real_escape_string($_POST["groupid"]) 		. "','joined'" .
				")";
		$query_add = mysqli_query($con,$sql);
		echo $query_add;
		mysqli_close($con);
	}
?>
