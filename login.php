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
	include "db.php";
	if(isset($_POST['login']))
	{
		//$username=mysqli_real_escape_string(htmlspecialchars(trim($_POST['username'])));
		//$password=mysqli_real_escape_string(htmlspecialchars(trim($_POST['password'])));
		$username = $_POST['username'];
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

		$sql = "select * from `user` where `username`='$username' and `password`='$password'";
		$select = mysqli_query($con,$sql);
		//$numrows = mysqli_num_rows($select);
		if ($select)
		{
			$rows = array();
			while($row=mysqli_fetch_array($select))
				$rows[]= $row;
		}
		mysqli_close($con);
		echo json_encode($rows);
	}//end of isset($_POST['login'])
?>