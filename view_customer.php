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

		<table>
			<h1>
				view customer
			</h1>
			
	<tr>
		
	</tr>
	<tr>
		
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

	</table>
	
	<?php
	$cn = mysqli_connect("localhost","root","","website") or die(mysqli_error());
	$sql = "SELECT user_id, user_name, first_name, last_name, user_type, email,password, gender, contact_number, address,  date_of_birth, c.city_id  FROM user u,city c where u. city_id=c.city_id;";
	$result = mysqli_query($cn,$sql);

	echo "<br>";
	
	echo mysqli_num_rows($result)." records found";
	echo "<table align='center' border='2' bordercolor='black' width='100%'>";
    echo "<tr bgcolor='purple'>";
    echo "<td><b><font face='Arial, Helvetica, sans-serif'>&nbsp;user_Id</font></b></td>";
    echo "<td><b><font face='Arial, Helvetica, sans-serif'>&nbsp;user_name</font></b></td>";
    echo "<td><b><font face='Arial, Helvetica, sans-serif'>&nbsp;first_name</font></b></td>";
	echo "<td><b><font face='Arial, Helvetica, sans-serif'>&nbsp;last_name</font></b></td>";
    echo "<td><b><font face='Arial, Helvetica, sans-serif'>&nbsp;user_type</font></b></td>";
    echo "<td align='center'><b><font face='Arial, Helvetica, sans-serif'>&nbsp;email</font></b></td>";
    echo "<td><b><font face='Arial, Helvetica, sans-serif'>&nbsp;Password</font></b></td>";
    echo "<td><b><font face='Arial, Helvetica, sans-serif'>&nbsp;contact_number</font></b></td>";
    echo "<td><b><font face='Arial, Helvetica, sans-serif'>&nbsp;gender</font></b></td>";
    echo "<td align='center'><b><font face='Arial, Helvetica, sans-serif'>&nbsp;address</font></b></td>";
    echo "<td align='center'><b><font face='Arial, Helvetica, sans-serif'>&nbsp;date_of_birth</font></b></td>";
    echo "<td align='center'><b><font face='Arial, Helvetica, sans-serif'>&nbsp;city_id</font></b></td>";
	echo "</tr>";
	echo "<br>";
				
	while($row = mysqli_fetch_array($result))  
     {
		echo "<tr>";
		echo "<td>${row['user_id']}</td>";
		echo "<td>${row['user_name']}</td>";
        echo "<td>${row['first_name']}</td>";
        echo "<td>${row['last_name']}</td>";
        echo "<td>${row['user_type']}</td>";
        echo "<td>${row['email']}</td>";
        echo "<td>${row['password']}</td>";
        echo "<td>${row['contact_number']}</td>";
        echo "<td>${row['gender']}</td>";
        echo "<td>${row['address']}</td>";
        echo "<td>${row['date_of_birth']}</td>";
        echo "<td>${row['city_id']}</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($cn);
	?>
</center>
<?php
include_once("include/footer.php");
?>


