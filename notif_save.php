<?php
	if ( isset($_POST['created_by']) && isset($_POST['payload']) && isset($_POST['target_group']) )
	{
		include "db.php";

		$sql = "INSERT INTO notif (created_by, payload, target_group_id)
				VALUES ( "  . mysql_real_escape_string($_POST["created_by"]) 		. "," .
						"'" . mysql_real_escape_string($_POST["payload"]) 		. "'," .
						" " . mysql_real_escape_string($_POST["target_group"]) 	. ")";
		$query_add = mysqli_query($con,$sql);
		echo $query_add;
		mysqli_close($con);
	}
?>