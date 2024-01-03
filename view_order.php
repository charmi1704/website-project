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

		<table style="color: #293d3d;">
			<h1>
			<header class="panel-heading">
				view order
			</header>
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
	$sql = "SELECT o.order_id,u.user_id,o.product_id,order_date,order_amount FROM `order` o ,user u,order_detail od where o.user_id=u.user_id and o.order_id=od.order_id";
	$result = mysqli_query($cn,$sql);

	echo "<br>";
	
	echo mysqli_num_rows($result)." records found";
	echo " <table border='1'bordercolor='black' width='50%'>";
	echo "<tr bgcolor='purple'>";
	echo "<td>order_Id</td>";
	echo "<td> order_date</td>";
	echo "<td>order_amount</th>";
    echo "<td>product_id</td>";
    echo "<td>user_id </td>";
	echo "</tr>";
	echo "<br>";
				
	while($row = mysqli_fetch_array($result))  
     {
		echo "<tr>";
		echo "<td>${row['order_id']}</td>";
		echo "<td>${row['order_date']}</td>";
        echo "<td>${row['order_amount']}</td>";
        echo "<td>${row['product_id']}</td>";
        echo "<td>${row['user_id']}</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($cn);
	?>
</center>
<?php
include_once("include/footer.php");
?>

