<?php session_start() ?>
<html>
	<body>
		<?php
		$cn=mysqli_connect("localhost","root","","website") or die("check connection");
		$city_name=$_POST['city_name'];
		$sql="insert into city (city_name)values ('$city_name')";
		$result=mysqli_query($cn,$sql);
		$_SESSION['msg']="city inserted";
		header("Location:city.php");
	?>
</body>
</html>
