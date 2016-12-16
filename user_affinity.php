<?php
	include "db.php";
	/**
	premise: multiple user accounts were created
	parent/guardian to student
	*/
	$sql = "SELECT * FROM user_temp GROUP BY std_num";
	$select = mysqli_query($con,$sql);
	if ($select)
	{
		$rows = array();
		while($row=mysqli_fetch_array($select))
			$rows[]= $row;
		for ($i=0; $i < mysqli_num_rows($select); $i++)
		{	//this for every std_num
			//create user account (student)
			$sql_std = "INSERT INTO user (lname,fname,mname) VALUES ('".$rows[$i]['std_lname']."','".$rows[$i]['std_fname']."','".$rows[$i]['std_mname']."')";
			mysqli_query($con,$sql_std);
			//get id of last inserted user (student)
			$stdid_created = mysqli_insert_id($con);
			//create record on user_role (student)
			$sql_std_role = "INSERT INTO user_role (std_id,role,group_id) VALUES ('".$stdid_created."','student',".$rows[$i]['group_id'].")";
			mysqli_query($con,$sql_std_role);

			//iterate through ALL users
			$sql_users = "SELECT * FROM user_temp WHERE std_num LIKE '" . $rows[$i]['std_num'] ."'";
			$select_users = mysqli_query($con,$sql_users);
			if ($select_users)
			{
				$rows_users = array();
				while($row_users=mysqli_fetch_array($select_users))
					$rows_users[]=$row_users;
				for ($j=0; $j < mysqli_num_rows($select_users); $j++)
				{
					//create user account for parents
					if ( $rows_users[$j]['relation'] === "father" )
					{
						$sql_father = "INSERT INTO user (lname,fname,mname,email,phone_num) 
								   VALUES ('"	.$rows_users[$j]['lname']."','"
								   				.$rows_users[$j]['fname']."','"
								   				.$rows_users[$j]['mname']."','"
								   				.$rows_users[$j]['email']."','"
								   				.$rows_users[$j]['phone_num']."')";
						mysqli_query($con,$sql_father);
						$fatherid_created = mysqli_insert_id($con);
						//create user acct for std_id's father
						$sql_father_role = "INSERT INTO user_role (std_id,parent_id,parent_type,role,group_id) 
											VALUES ('".$stdid_created."','".$fatherid_created."','father','parent',".$rows_users[$j]['group_id'].")";
						mysqli_query($con,$sql_father_role);
					}
					else if ( $rows_users[$j]['relation'] === "mother" )
					{
						$sql_mother = "INSERT INTO user (lname,fname,mname,email,phone_num) 
								   VALUES ('"	.$rows_users[$j]['lname']."','"
								   				.$rows_users[$j]['fname']."','"
								   				.$rows_users[$j]['mname']."','"
								   				.$rows_users[$j]['email']."','"
								   				.$rows_users[$j]['phone_num']."')";
						mysqli_query($con,$sql_mother);
						$motherid_created = mysqli_insert_id($con);
						//create user acct for std_id's mother
						$sql_mother_role = "INSERT INTO user_role (std_id,parent_id,parent_type,role,group_id) 
											VALUES ('".$stdid_created."','".$motherid_created."','mother','parent',".$rows_users[$j]['group_id'].")";
						mysqli_query($con,$sql_mother_role);
					}
					else if ( $rows_users[$j]['relation'] === "guardian" )
					{
						$sql_guardian = "INSERT INTO user (lname,fname,mname,email,phone_num) 
								   VALUES ('"	.$rows_users[$j]['lname']."','"
								   				.$rows_users[$j]['fname']."','"
								   				.$rows_users[$j]['mname']."','"
								   				.$rows_users[$j]['email']."','"
								   				.$rows_users[$j]['phone_num']."')";
						mysqli_query($con,$sql_guardian);
						$guardianid_created = mysqli_insert_id($con);
						//create user acct for std_id's guardian
						$sql_guardian_role = "INSERT INTO user_role (std_id,parent_id,parent_type,role,group_id) 
											VALUES ('".$stdid_created."','".$guardianid_created."','guardian','parent',".$rows_users[$j]['group_id'].")";
						mysqli_query($con,$sql_guardian_role);
					}
				}//end of for for
				
			}//end of if select users
				
		}//end of for

		//delete all records from user_temp
		$sql_delete = "DELETE FROM user_temp";
		mysqli_query($con,$sql_delete);
	}//end of if select
?>
