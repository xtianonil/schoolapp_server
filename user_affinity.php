<?php
	include "db.php";
	/**
	premise: multiple user accounts were created
	parent/guardian to student
	*/
	$z=0;

	$sql = "SELECT * FROM user_temp GROUP BY std_num";
	$select = mysqli_query($con,$sql);
	$numrows = mysqli_num_rows($select);
	$rows = array();
	while($row=mysqli_fetch_array($select))
		$rows[]= $row;
	for ($i=0; $i < $numrows; $i++)
	{	//iterate through each student number

		/*
		create student account
		*/
		
		$sql_user = "INSERT INTO user (lname) VALUES ('')";
		$sql_user_add = mysqli_query($con,$sql_user);

		$stdid_created = mysqli_insert_id($con);

		$sql_user_role = "INSERT INTO user_role (user_id, std_id, role) VALUES ('".$stdid_created."','".$stdid_created."','student')";
		$sql_user_role_add = mysqli_query($con,$sql_user_role);
		
		$sql1 = "SELECT * FROM user_temp WHERE relation LIKE 'father' AND std_id=" . $stdid_created;
		$select1 = mysqli_query($con,$sql1);
		$numrows1 = mysqli_num_rows($select1);
		$rows1 = array();
		while($row1=mysqli_fetch_array($select1))
			$rows1[]= $row1;
		for ($i=0; $i < $numrows1; $i++)
		{
			$sql_user = "INSERT INTO user (lname,fname,mname,email,phone_num,role) 
						 VALUES ('".$rows1[$i]['lname']."','" .$rows1[$i]['fname'] . "','".$rows1[$i]['mname']."')";
			$sql_user_add = mysqli_query($con,$sql_user);
		}
		/*
		$sql_parent = "SELECT * FROM user_temp WHERE std_num LIKE '". $rows[$i]['std_num'] ."'";

		$select_parent = mysqli_query($con,$sql_parent);
		$numrows_parent = mysqli_num_rows($select_parent);
		$rows_parent = array();
		while($row_parent=mysqli_fetch_array($select_parent))
			$rows_parent[] = $row_parent;
		for ($i=0; $i < $numrows_parent; $i++)
		{
			$rows[$i]['lname'] 
			//echo $rows[$i]['lname']	.	" "	.	$rows[$i]['fname']	. " ".$z++ .	"<br>";
		}
		*/
		//echo ($sql_user_add && $sql_user_role_add) ? "success" : "fail";
	}
?>