<?php
	if (isset($_POST["userid"]))
	{
		include "db.php";
		$sql = "SELECT * FROM user,user_role 
				WHERE (user.user_id = user_role.user_id OR user.user_id = user_role.std_id OR user.user_id = user_role.parent_id)
				AND user.user_id=" . mysqli_escape_string($con,$_POST["userid"]);
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