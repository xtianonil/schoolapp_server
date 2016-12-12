<?php
	if (isset($_POST['groupid']))
	{
		include "db.php";
		$sql = "SELECT * FROM notif,user WHERE notif.created_by = user.user_id AND target_group_id=" . $_POST['groupid'] . ";";
		$select = mysqli_query($con,$sql);
		$numrows = mysqli_num_rows($select);
		if ($numrows > 0)
		{
			$rows = array();
			while($row=mysqli_fetch_array($select))
				$rows[]= $row;
			echo json_encode($rows);
		}
		mysqli_close($con);
	}
?>