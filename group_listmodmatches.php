<?php

	if (
		isset($_POST['searchstring'])
		)
	{
		include "db.php";
		$sql = "SELECT * FROM user WHERE username LIKE '" 	. mysqli_real_escape_string($con,$_POST['searchstring']) . "' OR "	.
										"first_name LIKE '"	. mysqli_real_escape_string($con,$_POST['searchstring']) . "' OR "	.
										"last_name LIKE '"	. mysqli_real_escape_string($con,$_POST['searchstring']) . "' OR "	.
										"email LIKE '"		. mysqli_real_escape_string($con,$_POST['searchstring']) . "' ";
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

