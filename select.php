<!DOCTYPE html>
<html>
<head>
	<style>
	.obavijest {	
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
	$servername = "localhost";
	$username = "*********";
	$password = "*********";
	$ime_baze = "****************";
	$conn = new mysqli($servername, $username, $password, $ime_baze);
	mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	if(isset($_POST['submit'])){ 
		if($_POST['name']){	  
		$name=$_POST['name']; 
		$sql="SELECT Proizvod.*, Stanje.* FROM Proizvod, Stanje WHERE Proizvod.ID = Stanje.ID_Proizvoda AND Naziv LIKE '%" . $name .  "%' ORDER BY Naziv ASC"; 
		$result=mysqli_query($conn, $sql);
		if ($result->num_rows > 0) { 
  			$Naziv  =$row['Naziv'];  
        		$kolicina=$row['Kolicina'];
			$id=$row['ID_Proizvoda'];
	 			echo "<table border = 1>";
				echo '<div class="container">
					<table class="table table-striped" border = 1>
					<tr>
         				<td><b>Naziv proizvoda</b></td>
         				<td><b>Količina</b></td>
         				<td></td>
         				<td></td>
   					</tr></div>';
			while($row = mysqli_fetch_array($result)){
		 		echo "<br><tr>
          			<td>" . $row['Naziv'] . "</td>
          			<td>" . $row['Kolicina'] . "</td>
          			<td>" . "<a href=\"http://sve91.com.hr/test/update.php?id=". $row['ID_Proizvoda'] ."\""."class='btn btn-primary btn-md'".">Promijeni</a>" . "</td>
          			<td>" . " <a href=\"http://sve91.com.hr/test/delete.php?id=". $row['ID_Proizvoda'] ."\""."class='btn btn-danger btn-md'".">Obriši proizvod</a>" . "</td>
           			</tr></br>";
				}
		 		echo "</table>";
  		 	}else{ 
  				echo  "<p>Molimo unesite upit za pretraživanje</p>";     
  		 		
  		 	}
		}
  	} 
	$conn->close();
?>
				<br><a href="http://sve91.com.hr/test/products.php" class="btn">Vrati se na početnu stranicu</a></br>
			</div>
		</div>
	</div>
</body>
</html>
