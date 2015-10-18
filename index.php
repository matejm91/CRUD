<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "******";
$password = "*****";
$ime_baze = "*********";
$conn = new mysqli($servername, $username, $password, $ime_baze);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
$conn->close();
?>



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

<head> 
<meta charset="utf-8"> 
<title>Trazi proizvod</title> 
</head> 
 
 <h3>Unos novog proizvoda</h3> 
    <form action="http://sve91.com.hr/create.php">
    <input type="submit" value="Novi proizvod">
</form>

</body>
</html>
