<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">  
</head>
<body>

<?php
$servername = "localhost";
$username = "*******";
$password = "********";
$ime_baze = "*************";
$conn = new mysqli($servername, $username, $password, $ime_baze);
mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
if (isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''){
	$id1=$_GET['id'];
	$kolicina=$_POST['naziv'];
	$sql1="SELECT Proizvod.*, Stanje.* FROM Proizvod, Stanje WHERE Proizvod.ID='$id1' AND Stanje.ID_Proizvoda='$id1'";
	$result=mysqli_query($conn, $sql1);
	if ($result->num_rows > 0) { 
		while($row= $result->fetch_assoc()){ 
       	 	 $Naziv  =$row['Naziv'];  
       		 $Kolicina=$row['Kolicina'];
	 	 $id=$row['ID_Proizvoda'];
  		echo '<h3>Promijeni stanje proizvodu</h3>

		<br><form method="post" form accept-charset="utf-8" action="update.php" id="searchform">
	        Stanje proizvoda '. $Naziv .' je <input  type="number" name="naziv" value= '.$Kolicina.'>
	        <input  type="submit" name="promijeni" value="Promijeni količinu">
	        <input type="number" name="id" value= '.$id1.'></br>
	        </form>';
		}
		} 
  		else 
		{
		echo "Problem!!";
		}
}

$conn->close()
?>

<h3>Vrati se na pocetnu</h3>
<form action="http://sve91.com.hr/index.php">
<input type="submit" value="OK">
</form>
</body>
</html>
