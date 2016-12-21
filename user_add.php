<?php
	
	if ( //isset($_POST['username']) 		&&
		 //isset($_POST['password']) 		&&
		 //isset($_POST['verif_code']) 	&&
		 //isset($_POST['user_type']) 	&&
		 //isset($_POST['user_status']) 	&&
		 isset($_POST['email']) 		&&
		 isset($_POST['first_name']) 	&&
		 isset($_POST['middle_name']) 	&&
		 isset($_POST['last_name'])
	 	)
	{
		// checking for minimum PHP version
		if (version_compare(PHP_VERSION, '5.3.7', '<')) {
	    	exit("Sorry, this feature does not run on a PHP version smaller than 5.3.7 !");
		} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
	    	// if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
	    	// (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
	    	require_once("libraries/password_compatibility_library.php");
		}
		include "db.php";
		$sql = "INSERT INTO user (email, fname, mname, lname)
				VALUES ( ".//'" . password_hash( mysql_real_escape_string($_POST["password"]), PASSWORD_DEFAULT )	. "'," .
						//"'" . mysql_real_escape_string($_POST["verif_code"]) 	. "'," .
						//"'" . mysql_real_escape_string($_POST["user_type"]) 	. "'," .
						//"'" . mysql_real_escape_string($_POST["user_status"]) 	. "'," .
						"'" . mysql_real_escape_string($_POST["email"]) 		. "'," .
						"'" . mysql_real_escape_string($_POST["first_name"]) 	. "'," .
						"'" . mysql_real_escape_string($_POST["middle_name"]) 	. "'," .
						"'" . mysql_real_escape_string($_POST["last_name"]) 	. "' " .
				")";
				//echo $sql;
		$query_add = mysqli_query($con,$sql);
		echo mysqli_insert_id($con);
		mysqli_close($con);
	}
?>