<?php
	if( isset($_POST['table']) 			&&
		isset($_POST['field']) 			&&
		isset($_POST['searchstring']) 	&&
		isset($_POST['orderby'])
	 )
	{
		include "db.php";
		$sql = "SELECT * from ". $_POST["table"] .",user WHERE user.user_id = user_group.moderator_id AND " . $_POST["field"] . " LIKE '" . $_POST["searchstring"] ."' ORDER BY " . $_POST["orderby"] .";";
		$select = mysqli_query($con,$sql);
		$rows = array();
		while($row=mysqli_fetch_array($select)){
			$rows[]= $row;
		}

		mysqli_close($con);
		echo json_encode($rows);
	}
?>