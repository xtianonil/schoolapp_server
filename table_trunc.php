<?php
	if ( isset($_POST["table"]) )
	{
		include "db.php";
		if ( $_POST["table"] === "user" )
			$sql = "DELETE FROM " . $_POST["table"] . " WHERE !is_admin";
		else
			$sql = "DELETE FROM " . $_POST["table"];
		echo mysqli_query($con,$sql);
		mysqli_close($con);
	}
?>