<?php
	include "db.php";
	$sql = "SELECT * FROM `user` WHERE !is_admin ORDER BY lname,fname";
		$select = mysqli_query($con,$sql);
		$numrows = mysqli_num_rows($select);
		if ($select)
		{
			$rows = array();
			while($row=mysqli_fetch_array($select))
				$rows[]= $row;
			echo json_encode($rows);
		}
		else
			echo "login_error";
		mysqli_close($con);
?>