<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "svecomhr";
$password = "06Stlu6fO2";
$ime_baze = "svecomhr_Skladiste-Pulvis1";
$conn = new mysqli($servername, $username, $password, $ime_baze);

if(isset($_POST['submit'])){ 
  if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){ 
  $name=$_POST['name']; 
  $sql="SELECT Proizvod.*, Stanje.* FROM Proizvod, Stanje WHERE Naziv LIKE '%" . $name .  "%' AND Proizvod.ID = Stanje.ID_Proizvoda"; 
  $result=mysqli_query($conn, $sql);
  if ($result->num_rows > 0) { 
  	while($row= $result->fetch_assoc()){ 
         $Naziv  =$row['Naziv'];  
         $Kolicina=$row['Kolicina'];  
  	echo  "Stanje ".$Naziv . " je " . $Kolicina . " komada!!" . "<br>";  
  	}
  }
  else{ 
  echo  "<p>Please enter a search query</p>";     
  }
  }
  } 
$conn->close();
?>
</body>
</html>
