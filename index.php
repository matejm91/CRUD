<!DOCTYPE html>
<html>
<body>

	<head> 
	<meta charset="utf-8"> 
	<title>Trazi proizvod</title> 
	</head> 
 
<h3>Trazi proizvod</h3> 
	<p>Pretraga moguca po imenu</p> 
	<form  method="post" form accept-charset="utf-8" action="select.php" id="searchform" > 
	<input  type="text" name="name"> 
	<input  type="submit" name="submit" value="Search"> 
	</form>


 
<h3>Unos novog proizvoda</h3> 
	<form action="http://sve91.com.hr/create.php">
	<input type="submit" value="Novi proizvod">
	</form>

<h3>Promijeni proizvod</h3> 
	<form action="http://sve91.com.hr/update.php">
	<input type="submit" value="Promijeni proizvod">
	</form>
<br>
<?php
$servername = "localhost";
$username = "**********";
$password = "*******";
$ime_baze = "***********";
$conn = new mysqli($servername, $username, $password, $ime_baze);
mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$sql="SELECT Proizvod.*, Stanje.* FROM Proizvod, Stanje WHERE Naziv LIKE '%" . $name .  "%' AND Proizvod.ID = Stanje.ID_Proizvoda"; 
  $result=mysqli_query($conn, $sql);
  if ($result->num_rows > 0) { 
  	while($row= $result->fetch_assoc()){ 
         $Naziv  =$row['Naziv'];  
         $Kolicina=$row['Kolicina'];
	 $id=$row['ID_Proizvoda'];
	 	echo "Stanje ".$Naziv . " je " . $Kolicina . " komada!!	"."<a href='http://www.sve91.com.hr/update.php?id=$id'>Promijeni</a> "." <a href=\"http://sve91.com.hr/delete.php\">iksić</a>"."<br>";
  	}
  }
  else{ 
  echo  "<p>Please enter a search query</p>";     
  }
$conn->close();
?> 
	
</body>
</html>
