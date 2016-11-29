<?php
	include "db.php";
	if(isset($_POST['push_notif_received']))
	{
		$reg_id = $_POST['reg_id'];
		$q=mysqli_query($con,"INSERT INTO `user` (`reg_id`) VALUES ('$reg_id')");
		if($q)
			echo "success";
		else
			echo "error";
	}
 ?>