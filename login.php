<?php
/*
	include "db.php";
	if(isset($_POST['login']))
	{
		$reg_id = $_POST['reg_id'];
		$q=mysqli_query($con,"INSERT INTO `user` (`reg_id`) VALUES ('$reg_id')");
		if($q)
			echo "success";
		else
			echo "error";
	}
 */
 ?>

<?php
	// checking for minimum PHP version
	if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    	exit("Sorry, this feature does not run on a PHP version smaller than 5.3.7 !");
	} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    	// if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    	// (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    	require_once("libraries/password_compatibility_library.php");
	}
	if(isset($_POST['login']))
	{
		include "db.php";
		//$username=mysqli_real_escape_string(htmlspecialchars(trim($_POST['username'])));
		//$password=mysqli_real_escape_string(htmlspecialchars(trim($_POST['password'])));
		$email = $_POST['email_login'];
		$password = $_POST['password'];

		/*
		$login=mysqli_num_rows(mysqli_query($con,"select * from `user` where `username`='$username' and `password`='$password'"));
		if($login!=0)
		{
			echo "success";
		}
		else
		{
			echo "failed";
		}
		*/

		$sql = "select * from `user` where `email`='$email_login' and `password`='$password'";
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
	}//end of isset($_POST['login'])
?>