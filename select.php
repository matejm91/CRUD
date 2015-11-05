<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">  
</head>
<body>

<?php 
$servername = "localhost";
$username = "**********";
$password = "**********";
$ime_baze = "********************";
$conn = new mysqli($servername, $username, $password, $ime_baze);
mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
if(isset($_POST['submit'])){ 
  if($_POST['name']){	  
  $name=$_POST['name']; 
  $sql="SELECT Proizvod.*, Stanje.* FROM Proizvod, Stanje WHERE Naziv LIKE '%" . $name .  "%' AND Proizvod.ID = Stanje.ID_Proizvoda"; 
  $result=mysqli_query($conn, $sql);
  if ($result->num_rows > 0) { 
  	while($row= $result->fetch_assoc()){ 
         $Naziv  =$row['Naziv'];  
         $Kolicina=$row['Kolicina'];
	 $id=$row['ID_Proizvoda'];
  	echo "Stanje ".$Naziv . " je " . $Kolicina . " komada	"."<a href='http://www.sve91.com.hr/update.php?id=$id'>Promijeni</a>"." <a href=\"http://sve91.com.hr/delete.php\">iksić</a>"."<br>";
  	}
  }
  else{ 
  echo  "<p>Molimo unesite upit za pretraživanje</p>";     
  }
  }
  } 
 
$conn->close();
?>
<a href="http://sve91.com.hr/index.php">Vrati se na početnu stranicu</a>
</body>
</html>
