<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">  
</head>
<body>

<?php 
$servername = "localhost";
$username = "***********";
$password = "***********";
$ime_baze = "**********************";
$conn = new mysqli($servername, $username, $password, $ime_baze);
mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
if(isset($_POST['submit'])){ 
  if($_POST['name']){	  
  $name=$_POST['name']; 
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
  }
  } 
 
$conn->close();
?>
<a href="http://sve91.com.hr/index.php">Vrati se na početnu stranicu</a>
</body>
</html>
