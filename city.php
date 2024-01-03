<?php session_start() ?>
<?php
include_once("include/header.php");
?>

<?php
include_once("include/sidebar.php");
?>

<?php
include_once("include/main.php");
?>
<html>
	<body>
<center>

		
			<h1>
                	City List
              </h1>

	<form action="ins_city.php" method="post">
		<table>
	<tr>
		<td>City:</td>
		<td><input type="text" name="city_name" placeholder="Enter City Name"><br /><br /></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" value="submit" name="btn">
	</tr>
	<tr>
	<td>	
	<?php
	if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	unset ($_SESSION['msg']);
	}
	?></td>
	</tr>
	</form>
	</table>
	
	<?php
	$cn = mysqli_connect("localhost","root","","website") or die(mysqli_error());
	$sql = "select * from city";
	$result = mysqli_query($cn,$sql);

	echo "<br>";
	
	echo mysqli_num_rows($result)." records found";
	echo " <table border='2' bordercolor='black' width='40%'>";
	echo "<tr bgcolor='purple'>";
	echo "<td>City Id</td>";
	echo "<td>City Name</td>";
	echo "<td>Add New</th>";
	echo "</tr>";
	echo "<br>";
				
	while($row = mysqli_fetch_array($result))   {
		echo "<tr>";
		echo "<td>${row['city_id']}</td>";
		echo "<td>${row['city_name']}</td>";
		echo "<td><a href='edit_city.php?city_id=${row['city_id']}'><u>Edit</u></a> | <a href='del_city.php?city_id=${row['city_id']}'><u>Delete</u></a></td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($cn);
	?>
</center>
<?php
include_once("include/footer.php");
?>

