<?php
	include "db.php";
	$sql = "select * from `user` where user_type NOT LIKE 'school_admin' ORDER BY lname,fname";
		$select = mysqli_query($con,$sql);
		$numrows = mysqli_num_rows($select);
		if ($numrows > 0)
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