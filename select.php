<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">  
</head>
<p><body> 
	<h3>Stvori proizvod</h3>  
	<br><form  method="POST" action="create.php" id="searchform" > 
	<input  type="text" name="ime_stvori"> 
	<input  type="submit" name="create" value="Create"></br> 
	</form> 

<?php
$servername = "localhost";
$username = "svecomhr";
$password = "06Stlu6fO2";
$ime_baze = "svecomhr_Skladiste-Pulvis1";
$conn = new mysqli($servername, $username, $password, $ime_baze);
mysqli_set_charset($conn,'utf-8');
if(isset($_POST['create'])){	
  $name=$_POST['ime_stvori'];
  mysqli_query($conn,"INSERT INTO Proizvod (Naziv) VALUES ('$name')");
  $id=mysqli_insert_id($conn);
  $sql="INSERT INTO Stanje (ID_Proizvoda) VALUES ('$id')";
  if ($conn->query($sql) === TRUE) {
    echo "bravo, unio si proizvod ".$name." koji ima ID: ".$id."<br>";
  } else {
    echo "Greska: " . $sql . "<br>" . $conn->error;
  } 
}

$conn->close();
?>
 
<p><body> 
 <h3>Vrati se na pocetnu</h3> 
    <form action="http://sve91.com.hr/index.php">
    <input type="submit" value="OK">
</form>
</body>
</html>
