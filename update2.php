<?php
	$servername = "localhost";
	$username = '**********';
	$password = "**********";
	$ime_baze = "********************";
	$conn = new mysqli($servername, $username, $password, $ime_baze);
	mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	if (isset($_POST['prom'])){	
		$id=$_POST['id'];
		$Kolicina=$_POST['kolicina'];
		if (is_numeric($Kolicina)) {
			if ($Kolicina < 0) {
				echo "<br>"."Unešena vrijednost je: ".(filter_var($Kolicina, FILTER_SANITIZE_STRING))."</br>", "Unijeli ste nemoguću vrijednost" . '<br><a href="http://sve91.com.hr/products.php">Vrati se na početnu stranicu</a></br>';
			} 
			else {
				$sql = "UPDATE Stanje SET Kolicina = '$Kolicina' WHERE ID_Proizvoda = '$id'";
				if ($conn->query($sql) === TRUE) {
					header('Location:products.php?updated=true');
				} else {
					echo "Greška: " . $sql . "<br>" . $conn->error;
				} 
			}
		}
		else {
			echo "Niste unijeli broj.";
		}
	}	
	$conn->close();
?>
