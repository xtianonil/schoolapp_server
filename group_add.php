<?php
	if (
		isset($_POST["groupname"])	&&
		isset($_POST["grouptype"])	&&
		isset($_POST["groupmod"])
		)
	{
		include "db.php";
		$sql = "INSERT INTO user_group (group_name, group_type, moderator_id)
				VALUES ( '" . mysql_real_escape_string($_POST["groupname"]) 		. "'," 	.
						"'" . mysql_real_escape_string($_POST["grouptype"]) 		. "'".//," 	.
						//" " . mysql_real_escape_string($_POST["groupmod"]) 			. "  "	.
				")";
		$query_add = mysqli_query($con,$sql);
		echo $query_add;
		//echo mysqli_insert_id($con);
		mysqli_close($con);
	}
?>