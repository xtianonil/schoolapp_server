<?php

	if (isset($_POST['userid']))
	{
		include "db.php";
		$sql = "SELECT * FROM group_membership,user WHERE user.user_id = group_membership.user_id AND group_membership.user_id=" . $_POST['userid'] . ";";
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

