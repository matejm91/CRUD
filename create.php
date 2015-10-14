<!DOCTYPE html>
<html>
<body>

<head> 

 <title>Promijeni podatke</title> 
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

if(isset($_POST['create'])){ 
  $name=$_POST['ime_stvori'];
  $sql="INSERT INTO Proizvod (Naziv) VALUES ('$name')";
  if ($conn->query($sql) === TRUE) {
	$id=$row['ID']; 
    echo "bravo, stvorio si proizvod ".$name."<br>";
  } else {
    echo "Greska: " . $sql . "<br>" . $conn->error;
  } 
   $sql2="INSERT INTO Stanje (ID_Proizvoda) VALUES (global '$id')";
   if ($conn->query($sql2) === TRUE) {
   echo  "Proizvod ".$name . " ima ID: " . $id ."<br>";
   } else {
   echo "nesto ne valja";
   }
}
$conn->close();
?>

<head> 
<meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">  
</head> 
<p><body> 
 <h3>Vrati se na pocetnu</h3> 
    <form action="http://sve91.com.hr/index.php">
    <input type="submit" value="OK">
</form>

</body>
</html>
