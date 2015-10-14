<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "**********";
$password = "**********";
$ime_baze = "**************";
$conn = new mysqli($servername, $username, $password, $ime_baze);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
$conn->close();
?>



<head> 
<meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1"> 
<title>Trazi proizvod</title> 
</head> 
<p><body> 
 <h3>Trazi proizvod</h3> 
 <p>Pretraga moguca po imenu</p> 
 <form  method="post" action="select.php" id="searchform" > 
   <input  type="text" name="name"> 
   <input  type="submit" name="submit" value="Search"> 
</form>

<head> 
<meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1"> 
<title>Trazi proizvod</title> 
</head> 
<p><body> 
 <h3>Unos novog proizvoda</h3> 
    <form action="http://sve91.com.hr/create.php">
    <input type="submit" value="Novi proizvod">
</form>

</body>
</html>
