<?php
	include "db.php";
	$sql = "LOAD DATA LOCAL INFILE '/Users/20xesolutions/Dropbox/new_users.csv' INTO TABLE schoolapp.user_temp
	FIELDS TERMINATED BY ',' 
	ENCLOSED BY '\"' 
	LINES TERMINATED BY '\n'
	IGNORE 2 LINES
	(group_id, std_num, std_lname, std_fname, std_mname, relation, lname, fname, mname, email, phone_num);";
	echo mysqli_query($con,$sql);
	mysqli_close($con);
?>