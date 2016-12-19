<?php
	if ( isset($_GET["id"]) )
	{
		//echo $_GET["id"];
		//echo "account activation";
		include "db.php";
		$sql = "UPDATE User SET is_active = true WHERE user_id =" . $_GET['id'] . ";";

		$query_update = mysqli_query($con,$sql);
		//echo $query_update;
		//echo "Account is now activated. You can log in on the schoolapp";
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Account activation</title>
<!--
	jquery mobile
-->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>

<!--
	jquery 3.1.1
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$(function(){

		populateUsersList();
		showUserType();

		function truncateTable(tablename)
		{
			$.post("http://192.168.0.18/school_connect_server/table_trunc.php",{table:tablename})
				.done(function(data){
					//do something
				});
		}//end of truncateTable
		function populateUsersList()
		{
			$.post("http://192.168.0.18/school_connect_server/user_listnonadmin.php")
				.done(function(data){
					var users = JSON.parse(data);
					$(".users_affinity_list").empty();
					for (var i=0; i<users.length; i++)
					{
						$(".users_affinity_list").append(new Option(users[i].lname+", "+users[i].fname,users[i].user_id));
					}
				});
		}//end of populateUsersList
		function showUserType()
		{
			$.post("http://192.168.0.18/school_connect_server/user_listspecific.php",{userid:$(".users_affinity_list").val()})
				.done(function(data){
					var user = JSON.parse(data);
			
					if (user[0].role === "parent")
					{
						$(".user_type_label").text(user[0].role+" of ");
					}
					else
					{
						$(".user_type_label").text(user[0].role);
					}
					//alert("ASDF");
				});
		}//end of showUserType

		$(".user_affinity_btn").click(function(){
			$.post("http://192.168.0.18/school_connect_server/user_affinity.php")
				.done(function(data){
					alert("Operation successful.");
				});
			});//end of user affinity btn
		$(".truncate_btn").click(function(){
			if ( $(".table_dropdown").val() !== "all" )
			{
				truncateTable( $(".table_dropdown").val() );
			}
			else
			{
			 	$(".table_dropdown > option").each(function() {
			 		if ( this.value !== "all" )
			 		{
			 			truncateTable(this.value);//alert(this.text + ' ' + this.value);
			 		}
				});
			}
			alert("Operation successful.");
			});//end of truncate_btn.click
			
		$(".load_newusers_btn").click(function(){
			$.post("http://192.168.0.18/school_connect_server/csv_insert_newusers.php")
				.done(function(data){
					alert("Operation successful.");
				});
			});
		$(".users_affinity_list").change(function(){
			showUserType();
			});
	});//end of $(document).ready(function(){});
</script>
</head>

<body>
	<table>
		<tr>
			<td colspan="2">1. Load new users from csv</td>
			<td><button class="load_newusers_btn">Load new users</button></td>
		</tr>
		<tr>
			<td colspan="2">2. Link parents to child/student</td>
			<td><button class="user_affinity_btn">Set affinity</button></td>
		</tr>
		<tr>
			<td>Table:</td>
			<td><select class="table_dropdown">
					<option>user_role</option>
					<option>user_temp</option>
					<option>user</option>
					<option>all</option>
				</select></td>
			<td><button class="truncate_btn">Truncate</button></td>
		</tr>
		<tr>
			<td>Users</td>
			<td><select class="users_affinity_list"></select></td>
			<td><label class="user_type_label"></label></td>
		</tr>
	</table>
</body>

</html>