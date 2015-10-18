<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">  
</head>
<body>
	
<h3>Stvori proizvod</h3> 
	
<br><form  method="POST" form accept-charset="utf-8" action="create.php" id="searchform" > 
<input  type="text" name="ime_stvori"> 
<input  type="submit" name="create" value="Create"></br> 
</form> 

<?php 
$servername = "localhost";
$username = "******";
$password = "******";
$ime_baze = "********";
$conn = new mysqli($servername, $username, $password, $ime_baze);
mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
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
<h3>Vrati se na pocetnu</h3>
<form action="http://sve91.com.hr/index.php">
<input type="submit" value="OK">
</form>
</body>
</html>
