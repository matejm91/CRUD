<?php 
	$servername = "localhost";
	$username = "*********";
	$password = "*********";
	$ime_baze = "******************";
	$conn = new mysqli($servername, $username, $password, $ime_baze);
	mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	if(isset($_POST['create'])){	
	$name=$_POST['ime_stvori'];
	mysqli_query($conn,"INSERT INTO Proizvod (Naziv) VALUES ('$name')");
	$id=mysqli_insert_id($conn);
	$sql="INSERT INTO Stanje (ID_Proizvoda) VALUES ('$id')";
		if ($conn->query($sql) === TRUE) {
			header('Location:/test/products.php?created=true'); 
		}
		else
		{
			echo "Greška: " . $sql . "<br>" . $conn->error;
		} 
	}
	$conn->close();
?>
