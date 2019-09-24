<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM tbl_employees ORDER BY id DESC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>ID</td>
		<td>eFirstName</td>
		<td>eLastName</td>
		<td>eGender</td>
		<td>eDepartment</td>
		<td>eDateEmployed</td>
		<td>eSalary</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['ID']."</td>";
		echo "<td>".$row['eFirstName']."</td>";
		echo "<td>".$row['eLastName']."</td>";
		echo "<td>".$row['eGender']."</td>";
		echo "<td>".$row['eDepartment']."</td>";	
		echo "<td>".$row['eDateEmployed']."</td>";
		echo "<td>".$row['eSalary']."</td>";
		echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
