<?php
	include "db.php";
	$sql = "select * from user_group";
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
?>