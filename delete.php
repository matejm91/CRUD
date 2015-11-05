<!DOCTYPE html>
<html>
<body>
<?php
$servername = "localhost";
$username = "***********";
$password = ***********";
$ime_baze = "*************";
$conn = new mysqli($servername, $username, $password, $ime_baze);  
$id = $_GET['id'];

	mysqli_query($conn, "DELETE FROM Stanje WHERE ID_Proizvoda = '$id' ");
	$query="DELETE FROM Proizvod WHERE ID = '$id'";
	$result=mysqli_query($conn, $query);	
	if ($result === TRUE){
	echo "Proizvod obrisan";
	}
	else{
	echo "Nesto nije u redu!";
}
$conn->close();
?> 
</body>
</html>
