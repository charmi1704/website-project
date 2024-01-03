<?php session_start() ?>
<html>
	<body>
		<?php
		$cn=mysqli_connect("localhost","root","","website") or die("check connection");
		$city_id=$_POST['city_id'];
		$city_name=$_POST['city_name'];
		$sql="update city set city_name='$city_name' where city_id=$city_id";
		$result=mysqli_query($cn,$sql);
		$_SESSION['msg']="city updated";
		header("Location:city.php");
	?>
</body>
</html>
