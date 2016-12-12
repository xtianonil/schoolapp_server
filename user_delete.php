<?php
	if(isset($_POST['userid']))
	{
		include "db.php";
		$sql = "DELETE FROM user WHERE user_id=". $_POST["userid"] . ";";
		$delete_query = mysqli_query($con,$sql);

		echo $delete_query;

		$sql2 = "DELETE FROM group_membership WHERE user_id=". $_POST["userid"] . ";";
		$delete_query2 = mysqli_query($con,$sql2);

		echo $delete_query2;

		mysqli_close($con);
	}
?>