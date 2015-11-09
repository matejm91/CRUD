<?php
$servername = "localhost";
$username = "*********";
$password = "*********";
$ime_baze = "******************";
$conn = new mysqli($servername, $username, $password, $ime_baze);
mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
if (isset($_POST['prom'])){	
	if ($_POST['kolicina']){
	if ($_POST['id']){
	$id=$_POST['id'];
	$Kolicina=$_POST['kolicina'];
		if (!preg_match('/^[0-9]*$/', $Kolicina)) {
        		echo "Unijeli ste nemoguću vrijednost" . '<br><a href="http://sve91.com.hr/index.php">Vrati se na početnu stranicu</a></br>';
	}
	$result1=mysqli_query($conn, "UPDATE Stanje SET Kolicina = '$Kolicina' WHERE ID_Proizvoda = '$id' ");
	header('Location:index.php?updated=true'); 
	}
	else{
	echo "Nešto nije u redu";
}
}
}	
$conn->close()
?>
