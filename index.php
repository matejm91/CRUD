<!DOCTYPE html>
<html>
<body>
	<?php
	if(isset($_GET['created']) && $_GET['created'] === 'true'){
	echo '<p>Proizvod uspješno stvoren</p>';
}
elseif(isset($_GET['updated']) && $_GET['updated'] === 'true'){
	echo '<p>Proizvod uspješno promijenjen</p>';
}
elseif(isset($_GET['deleted']) && $_GET['deleted'] === 'true'){
	echo '<p>Proizvod uspješno obrisan</p>';
}	
	?>
	<head> 
	<meta charset="utf-8"> 
	<title>Traži proizvod</title> 
	</head> 
 
<h3>Traži proizvod</h3> 
	<p>Pretraga moguća po imenu</p> 
	<form  method="post" form accept-charset="utf-8" action="select.php" id="searchform" > 
	<input  type="text" name="name"> 
	<input  type="submit" name="submit" value="Traži"> 
	</form>

<h3>Unos novog proizvoda</h3> 
	<form action="http://sve91.com.hr/create.php">
	<input type="submit" value="Novi proizvod">
	</form>
<br>
<?php
$servername = "localhost";
$username = "**********";
$password = "**********";
$ime_baze = "**********************";
$conn = new mysqli($servername, $username, $password, $ime_baze);
mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$sql="SELECT Proizvod.*, Stanje.* FROM Proizvod, Stanje WHERE Naziv LIKE '%" . $name .  "%' AND Proizvod.ID = Stanje.ID_Proizvoda"; 
  $result=mysqli_query($conn, $sql);
  if ($result->num_rows > 0) { 
  	$Naziv  =$row['Naziv'];  
        $kolicina=$row['Kolicina'];
	$id=$row['ID_Proizvoda'];
	 	echo "<table border = 1>";
		echo "<tr>
         <td>Naziv proizvoda</td>
         <td>Količina</td>
         <td></td>
         <td></td>
   </tr>";
		while($row = mysqli_fetch_array($result)){
		 echo "<tr>
          <td>" . $row['Naziv'] . "</td>
          <td>" . $row['Kolicina'] . "</td>
          <td>" . "<a href=\"http://sve91.com.hr/update.php?id=". $row['ID_Proizvoda'] ."\">Promijeni</a>" . "</td>
          <td>" . " <a href=\"http://sve91.com.hr/delete.php?id=". $row['ID_Proizvoda'] ."\">Obriši proizvod</a>" . "</td>
           
   </tr>";
		}

		 echo "</table>";
  		 }else{ 
  echo  "<p>Molimo unesite upit za pretraživanje</p>";     
}
$conn->close();
?> 	
</body>
</html>
