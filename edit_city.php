<?php session_start() ?>
<html lang="en">

<?php
	
	$cn = mysqli_connect("localhost","root","","website") or die(mysqli_error());
	$city_id = $_GET['city_id'];
	$sql = "select * from city where city_id='$city_id'";
	$result = mysqli_query($cn,$sql);
	$rec=mysqli_fetch_array($result);
	mysqli_close($cn);
	
?>
<center>
<html>
	<body>
		<table>
			<h1>
			<header>
                	Edit City
              </header></h1>

		<form action="edit_city1.php" method="post">
		<input type="hidden" name="city_id" value="<?php echo $rec['city_id'];?>"/>
		<tr>
			<td><b>city Name:</b><br /></td>
			<td><input type="text" required value="<?php echo $rec['city_name']; ?>"
			name="city_name"/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" class="btn btn-danger" value="save"/><br /><br /></td>
			
		</tr>
		<tr>
			<td></td>
			<td><a href="city.php"><u><b>Back</b></u></a></td>
		</tr>
		</table>
	</body>
		

</center>
</html>
<br><br><br><br><br>
