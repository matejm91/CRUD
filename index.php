<!DOCTYPE html>
<html>
<body>

	<head> 
	<meta charset="utf-8"> 
	<title>Traži proizvod</title> 
	</head> 
 
<h3>Traži proizvod</h3> 
	<p>Pretraga moguća po imenu</p> 
	<form  method="post" form accept-charset="utf-8" action="select.php" id="searchform" > 
	<input  type="text" name="name"> 
	<input  type="submit" name="submit" value="Search"> 
	</form>


 
<h3>Unos novog proizvoda</h3> 
	<form action="http://sve91.com.hr/create.php">
	<input type="submit" value="Novi proizvod">
	</form>
<br>
<?php
$servername = "localhost";
$username = "svecomhr";
$password = "06Stlu6fO2";
$ime_baze = "svecomhr_Skladiste-Pulvis1";
$conn = new mysqli($servername, $username, $password, $ime_baze);
mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$sql="SELECT Proizvod.*, Stanje.* FROM Proizvod, Stanje WHERE Naziv LIKE '%" . $name .  "%' AND Proizvod.ID = Stanje.ID_Proizvoda"; 
  $result=mysqli_query($conn, $sql);
  if ($result->num_rows > 0) { 
  	while($row= $result->fetch_assoc()){ 
         $Naziv  =$row['Naziv'];  
         $kolicina=$row['Kolicina'];
	 $id=$row['ID_Proizvoda'];
	 	echo "Stanje ".$Naziv . " je " . $kolicina . " komada	"."<a href=\"http://sve91.com.hr/update.php?id=". $id ."\">Promijeni</a> "." <a href=\"http://sve91.com.hr/delete.php?id=". $id ."\">Obriši proizvod</a>"."<br>";
  	}
  }
  else{ 
  echo  "<p>Molimo unesite upit za pretraživanje</p>";     
  }
;
$conn->close();
?> 
	
</body>
</html>
