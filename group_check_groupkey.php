<?php
	include "db.php";
	if ( isset($_POST['groupkey']) )
	{
		$sql = "SELECT * FROM user_group WHERE group_key LIKE '" . $_POST['groupkey'] ."';";
		$select = mysqli_query($con,$sql);
		$numrows = mysqli_num_rows($select);
		if ($numrows > 0)
			echo "group_key_valid";
		else
			echo "group_key_invalid";

		mysqli_close($con);
	}
 ?>