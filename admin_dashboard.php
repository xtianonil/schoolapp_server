<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ADMIN DASHBOARD</title>
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
		$("#user_affinity_btn").click(function(){
			$.post("http://192.168.0.18/school_connect_server/user_affinity.php")
				.done(function(data){
					//alert(data);
				});
			});
	});
</script>
</head>

<body>
	<table>
		<tr>
			<td>2nd part of batch encode</td>
			<td>
				<button id="user_affinity_btn">Affinity</button>
			</td>
		</tr>
	</table>
</body>

</html>