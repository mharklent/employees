<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$eFirstName = $_POST['eFirstName'];
	$eLastName = $_POST['eLastName'];
	$eGender = $_POST['eGender'];
	$eDepartment = $_POST['eDepartment'];
	$eDateEmployed = $_POST['eDateEmployed'];
	$eSalary = $_POST['eSalary'];
	
	// checking empty fields
	if(empty($eFirstName) || empty($eLastName) || empty($eGender) || empty($eDepartment) || empty($eDateEmployed) || empty($eSalary)) {
				
		if(empty($eFirstName)) {
			echo "<font color='red'>eFirstName field is empty.</font><br/>";
		}
		
		if(empty($eLastName)) {
			echo "<font color='red'>eLastName field is empty.</font><br/>";
		}
		
		if(empty($eGender)) {
			echo "<font color='red'>eGender field is empty.</font><br/>";
		}
		if(empty($eDepartment)) {
			echo "<font color='red'>eDepartment field is empty.</font><br/>";
		}
		
		if(empty($eDateEmployed)) {
			echo "<font color='red'>eDateEmployed field is empty.</font><br/>";
		}
		if(empty($eSalary)) {
			echo "<font color='red'>eSalary field is empty.</font><br/>";
		}
				
	} else {	
		//updating the table
		$sql = "UPDATE tbl_employees SET eFirstName=:eFirstName, eLastName=:eLastName, eGender=:eGender, eDepartment=:eDepartment, eDateEmployed=:eDateEmployed, eSalary=:eSalary WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':eFirstName', $eFirstName);
		$query->bindparam(':eLastName', $eLastName);
		$query->bindparam(':eGender', $eGender);
		$query->bindparam(':eDepartment', $eDepartment);
		$query->bindparam(':eDateEmployed', $eDateEmployed);
		$query->bindparam(':eSalary', $eSalary);
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM tbl_employees WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$eFirstName = $row['eFirstName'];
	$eLastName = $row['eLastName'];
	$eGender = $row['eGender'];
	$eDepartment = $row['eDepartment'];
	$eDateEmployed = $row['eDateEmployed'];
	$eSalary = $row['eSalary'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>eFirstName</td>
				<td><input type="text" name="eFirstName" value="<?php echo $eFirstName;?>"></td>
			</tr>
			<tr> 
				<td>eLastName</td>
				<td><input type="text" name="eLastName" value="<?php echo $eLastName;?>"></td>
			</tr>
			<tr> 
				<td>eGender</td>
				<td><input type="text" name="eGender" value="<?php echo $eGender;?>"></td>
			</tr>
			<tr> 
				<td>eDepartment</td>
				<td><input type="text" name="eDepartment" value="<?php echo $eDepartment;?>"></td>
			</tr>
			<tr> 
				<td>eDateEmployed</td>
				<td><input type="text" name="eDateEmployed" value="<?php echo $eDateEmployed;?>"></td>
			</tr>
			<tr> 
				<td>eSalary</td>
				<td><input type="text" name="eSalary" value="<?php echo $eSalary;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
