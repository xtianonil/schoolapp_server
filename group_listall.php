<?php
		include "db.php";
		$sql = "select * from user_group WHERE group_type NOT LIKE 'school'";
		$select = mysqli_query($con,$sql);
		//alert($sql);
		//echo $sql;
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