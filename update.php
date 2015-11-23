<!DOCTYPE html>
<html>
<head>
	<style>
	.obavijest {	
	}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
	<meta charset="utf-8"> 
	<title>Traži proizvod</title> 
	<meta name ="viewport" content="width=device-width, intital-scale=1.0">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/coustom.css">
</head> 
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
<?php
$servername = "localhost";
$username = "********";
$password = "********";
$ime_baze = "************************";
$conn = new mysqli($servername, $username, $password, $ime_baze);
mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
if (isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''){
	$id1=$_GET['id'];
	$result=mysqli_query($conn, "SELECT Proizvod.*, Stanje.* FROM Proizvod, Stanje WHERE Proizvod.ID='$id1' AND Stanje.ID_Proizvoda='$id1'");
	if ($result->num_rows > 0) { 
		while($row= $result->fetch_assoc()){ 
       	 	 $Naziv  =$row['Naziv'];  
       		 $Kolicina=$row['Kolicina'];
	 	 $id=$row['ID_Proizvoda'];
  		echo '<h3>Promijeni stanje proizvodu</h3>

		<br><form method="post" form accept-charset="utf-8" action="update2.php" id="searchform">
	        Stanje proizvoda '. $Naziv .' je <input  type="number" name="kolicina" value= '.$Kolicina.'>
	        <input class="btn btn-primary" type="submit" name="prom" value="Promijeni količinu">
	        <input type="hidden" name="id" value= '.$id1.'></br>
	        </form>';
		}
		} 
  		else 
		{
		echo "Problem";
		}
}	
$conn->close()
?>
<br><a href="http://sve91.com.hr/products.php" class="btn btn-primary">Vrati se na početnu stranicu</a></br>
			</div>
		</div>
	</div>
</body>
</html>
