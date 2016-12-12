<?php
	
	if ( isset($_POST['username']) 		&&
		 isset($_POST['password']) 		&&
		 isset($_POST['verif_code']) 	&&
		 isset($_POST['user_type']) 	&&
		 isset($_POST['user_status']) 	&&
		 isset($_POST['email']) 		&&
		 isset($_POST['first_name']) 	&&
		 isset($_POST['last_name'])
	 	)
	{
		include "db.php";
		$sql = "INSERT INTO user (username, password, verif_code, user_type, user_status, email, fname, lname)
				VALUES ( '" . mysql_real_escape_string($_POST["username"]) 		. "'," .
						"'" . mysql_real_escape_string($_POST["password"]) 		. "'," .
						"'" . mysql_real_escape_string($_POST["verif_code"]) 	. "'," .
						"'" . mysql_real_escape_string($_POST["user_type"]) 	. "'," .
						"'" . mysql_real_escape_string($_POST["user_status"]) 	. "'," .
						"'" . mysql_real_escape_string($_POST["email"]) 		. "'," .
						"'" . mysql_real_escape_string($_POST["first_name"]) 	. "'," .
						"'" . mysql_real_escape_string($_POST["last_name"]) 	. "' " .
				")";
		$query_add = mysqli_query($con,$sql);
		echo mysqli_insert_id($con);
		mysqli_close($con);
	}
?>