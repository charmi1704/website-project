<html>
	<body>
<center>

		<table>
			<h1>
				view payment
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
	$sql = "SELECT feedback_id,u.user_name,product_id,feedback_date,feedback FROM feedback f,user u where f.user_id=u.user_id;";
	$result = mysqli_query($cn,$sql);

	echo "<br>";
	
	echo mysqli_num_rows($result)." records found";
	echo " <table border='1'>";
	echo "<tr>";
	echo "<td>feedback Id</td>";
	echo "<td> user_name</td>";
	echo "<td>product_id</th>";
    echo "<td>feedback_date</td>";
    echo "<td>feedback </td>";
	echo "</tr>";
	echo "<br>";
				
	while($row = mysqli_fetch_array($result))  
     {
		echo "<tr>";
		echo "<td>${row['payment_id']}</td>";
		echo "<td>${row['order_id']}</td>";
        echo "<td>${row['amount']}</td>";
        echo "<td>${row['date']}</td>";
        echo "<td>${row['user_id']}</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($cn);
	?>
</center>


