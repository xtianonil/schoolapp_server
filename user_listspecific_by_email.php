<?php
	if (isset($_POST["email"]))
	{
		include "db.php";
		$sql = "SELECT * FROM user
				WHERE user.email LIKE '" . mysqli_escape_string($con,$_POST["email"]) . "' ";
		$select = mysqli_query($con,$sql);
		$numrows = mysqli_num_rows($select);
		if ($numrows > 0)
		{
			$rows = array();
			while($row=mysqli_fetch_array($select))
				$rows[]= $row;
			echo json_encode($rows);
			mysqli_close($con);
		}
	}
?>