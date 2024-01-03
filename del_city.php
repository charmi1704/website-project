<?php session_start() ?>
<html>
	<body>
		<?php
		$cn=mysqli_connect("localhost","root","","project") or die("check connection");
		$city_id=$_GET['city_id'];
		$sql="delete from city where city_id='$city_id'";
		$result=mysqli_query($cn,$sql);
		$_SESSION['msg']="city deleted";
		header("Location:city.php");
	?>
</body>
</html>
