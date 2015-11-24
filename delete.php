<?php
$servername = "localhost";
$username = "********";
$password = "********";
$ime_baze = "****************";
$conn = new mysqli($servername, $username, $password, $ime_baze);  
$id = $_GET['id'];

	mysqli_query($conn, "DELETE FROM Stanje WHERE ID_Proizvoda = '$id' ");
	$query="DELETE FROM Proizvod WHERE ID = '$id'";
	$result=mysqli_query($conn, $query);	
	if ($result === TRUE){
	header('Location:products.php?deleted=true');
	}
	else{
	echo "Nešto nije u redu!";
}
$conn->close();
?> 
