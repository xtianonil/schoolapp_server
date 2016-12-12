<?php
	if (isset($_POST['userid']))
	{
		include "db.php";
		$sql = "(select * from user_group,user,group_membership WHERE user_group.group_id = group_membership.group_id AND group_membership.user_id = user.user_id AND user_group.group_type NOT LIKE 'school' AND user.user_id=" . $_POST['userid'].");";
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
	}
?>