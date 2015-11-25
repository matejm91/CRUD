<?php
 	session_start();
	if($_SESSION['login'] != "OK")
	{
		header('Location: /test/index.php');
		exit();
	}
?>
 
<!DOCTYPE html>
<html>
<head>
	<style>
	.alert {			
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
			<div class="col-md-6">

<?php
	$stvoren="Proizvod uspješno stvoren";
	$promijenjen="Stanje proizvoda uspješno promijenjeno";
	$obrisan="Proizvod uspješno obrisan"; 
	if(isset($_GET['created']) && $_GET['created'] === 'true') {
		echo '<div class="alert alert-success" role="alert">'.$stvoren.'</div>';
	} elseif (isset($_GET['updated']) && $_GET['updated'] === 'true') {
		echo '<div class="alert alert-success" role="alert">'.$promijenjen.'</div>';
	} elseif (isset($_GET['deleted']) && $_GET['deleted'] === 'true') {
		echo '<div class="alert alert-success" role="alert">'.$obrisan.'</div>';
	}	
?>
 
<h3>Traži proizvod</h3>  
	<form action="/test/select.php" method="post" form accept-charset="utf-8">
		<div class="form-group">
    			<label for="pretraga">Pretraga moguća po imenu</label>
    			<input type="text" class="form-control" id="pretraga" placeholder="Unesite ime proizoda" name="name">
  		</div>
		<button type="submit" name="submit" class="btn btn-primary">Traži</button>
	 </form>

<h3>Unos novog proizvoda</h3> 
	<form action="http://sve91.com.hr/test/create.php">
	<input class="btn btn-primary" type="submit" value="Novi proizvod">
	</form><br>

<?php
	$servername = "localhost";
	$username = "svecomhr";
	$password = "06Stlu6fO2";
	$ime_baze = "svecomhr_test1";
	$conn = new mysqli($servername, $username, $password, $ime_baze);
	mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	$sql="SELECT Proizvod.*, Stanje.* FROM Proizvod, Stanje WHERE Proizvod.ID = Stanje.ID_Proizvoda AND Naziv LIKE '%" . $name .  "%' ORDER BY Naziv ASC"; 
	$result=mysqli_query($conn, $sql);
	if ($result->num_rows > 0) { 
  		$Naziv  =$row['Naziv'];  
        	$kolicina=$row['Kolicina'];
		$id=$row['ID_Proizvoda'];
	 		echo '<div class="container">
				<table class="table table-striped" border = 1>
				<tr>
         			<td><b>Naziv proizvoda</b></td>
         			<td><b>Količina</b></td>
         			<td></td>
         			<td></td>
   				</tr></div>';
			while($row = mysqli_fetch_array($result)){
				echo "<tr>
          			<td>" . $row['Naziv'] . "</td>
          			<td>" . $row['Kolicina'] . " kom</td>
          			<td>" . "<a href=\"http://sve91.com.hr/test/update.php?id=". $row['ID_Proizvoda'] ."\" "."class='btn btn-primary btn-md'".">Promijeni</a>" . "</td>
          			<td>" . "<a href=\"http://sve91.com.hr/test/delete.php?id=". $row['ID_Proizvoda'] ."\" "."class='btn btn-danger btn-md' onclick='return confirm(\"Jeste li sigurni da želite obrisati proizvod?\")';".">Obriši proizvod</a>" . "</td>
				</tr>";
			}
		 	echo "<p>&nbsp;</p></table>";
		 	echo "<p>&nbsp;</p>";
  	}
	else
	{ 
  		 echo  "<p>Molimo unesite upit za pretraživanje</p>";     
	}
	$conn->close();
?>
<script>
	$(document).ready(function(){
	    	setTimeout(function(){
	        	$('.alert').hide();}, 5000);
	});
</script>
			</div>
		</div>
	</div>
</body>
</html>
