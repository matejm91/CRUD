<?php
  session_start();
  if($_SESSION['login'] != "OK")
  {
    header('Location: index.php');
    exit();
  }
?>
 
<!DOCTYPE html>
<html>
<head>
	<?php
		echo "<p>You have successfully logged in!</p>";
		echo "<p>Your username is: ";
		echo $_SESSION['username'];
		echo "<br/>";
		echo "Your password is: ";
		echo $_SESSION['password'];
		echo "</p>"
	?>
	<style>
	.obavijest {
		text-align:center;
		text-transform:uppercase;
		text-decoration:underline;
		text-decoration:bold;
		color:blue;
		font-size:30px;			
	}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
	<meta charset="utf-8"> 
	<title>Traži proizvod</title> 
	<meta name ="viewport" content="width=device-width, intital-scale=1.0">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/coustom.css">
</head> 
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">

<?php
	$stvoren="Proizvod uspješno stvoren";
	$promijenjen="Stanje proizvoda uspješno promijenjeno";
	$obrisan="Proizvod uspješno obrisan"; 
	if(isset($_GET['created']) && $_GET['created'] === 'true') {
		echo '<div class="obavijest">'.$stvoren.'</div>';
	} elseif (isset($_GET['updated']) && $_GET['updated'] === 'true') {
		echo '<div class="obavijest">'.$promijenjen.'</div>';
	} elseif (isset($_GET['deleted']) && $_GET['deleted'] === 'true') {
		echo '<div class="obavijest">'.$obrisan.'</div>';
	}	
?>
 
<h3>Traži proizvod</h3>  
	<form action="select.php" method="post" form accept-charset="utf-8">
		<div class="form-group">
    			<label for="pretraga">Pretraga moguća po imenu</label>
    			<input type="text" class="form-control" id="pretraga" placeholder="Unesite ime proizoda" name="name">
  		</div>
		<button type="submit" name="submit" class="btn btn-primary">Traži</button>
	 </form>

<h3>Unos novog proizvoda</h3> 
	<form action="http://sve91.com.hr/create.php">
	<input class="btn btn-primary" type="submit" value="Novi proizvod">
	</form>
<br>
<?php
$servername = "localhost";
$username = "**********";
$password = "**********";
$ime_baze = "********************";
$conn = new mysqli($servername, $username, $password, $ime_baze);
mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
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
          <td>" . "<a href=\"http://sve91.com.hr/update.php?id=". $row['ID_Proizvoda'] ."\" "."class='btn btn-primary btn-md'".">Promijeni</a>" . "</td>
          <td>" . "<a href=\"http://sve91.com.hr/delete.php?id=". $row['ID_Proizvoda'] ."\" "."class='btn btn-primary btn-md'".">Obriši proizvod</a>" . "</td>
           
   </tr>";
		}

		 echo "</table>";
  		 }else{ 
  echo  "<p>Molimo unesite upit za pretraživanje</p>";     
}
$conn->close();
?>
<script>
$(document).ready(function(){
	    setTimeout(function(){
	        $('.obavijest').hide();}, 5000);
	});
</script>
			</div>
		</div>
	</div>
</body>
</html>
