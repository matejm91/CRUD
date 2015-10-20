<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">  
</head>
<body>

<h3>Promijeni stanje proizvodu</h3> 
	
<br><form  method="POST" form accept-charset="utf-8" action="update.php" id="searchform" > 
<input  type="text" name="naziv" value=""> 
<input  type="number" name="kolicina" value=""> 
<input  type="submit" name="update" value="Promijeni količinu"></br> 
</form> 

<?php 
$servername = "localhost";
$username = "*********";
$password = "********";
$ime_baze = "**************";
$conn = new mysqli($servername, $username, $password, $ime_baze);
mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
if(isset($_POST['submit'])){ 
  if($_POST['kolicina']){	  
  $kolicina=$_POST['kolicina'];
  $id=$_GET[''];
  $sql="UPDATE Stanje SET Kolicina=$kolicina WHERE ID_Proizvoda=$id"; 
  if ($conn->query($sql) === TRUE) { 
  	echo "Stanje je sada " . $kolicina . " komada!!	"."<br>";
  	}
  }
  else{ 
  echo  "<p>nest ne valja</p>";     
  }
  }
$conn->close(); 
?>

<h3>Vrati se na pocetnu</h3>
<form action="http://sve91.com.hr/index.php">
<input type="submit" value="OK">
</form>
</body>
</html>
