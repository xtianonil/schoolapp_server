<?php
	if ( isset( $_POST["userid"] ) )
	{
		include "db.php";

		$sql = "SELECT * FROM user_group WHERE group_id NOT IN (SELECT user_role.group_id FROM user_role, user_group WHERE user_role.group_id = user_group.group_id AND user_role.user_id = " . $_POST["userid"] .")";
		$select = mysqli_query($con, $sql);
		$numrows = mysqli_num_rows($select);
		if ( $numrows > 0 )
		{
			$rows = array();
			while($row = mysqli_fetch_array($select))
				$rows[]= $row;
			echo json_encode($rows);
		}
		mysqli_close($con);
	}
?>