<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
	<meta charset="utf-8"> 
	<meta name ="viewport" content="width=device-width, intital-scale=1.0">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/coustom.css">
</head> 
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">	
<form action="products.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="usrname" class="form-control" id="exampleInputEmail1" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Prijavi se</button>
</form>

<?php
$user = "******";
$pass = "******";
if (isset ($_POST['usrname'], $_POST['password'])) {
	if (($_POST['usrname']===$user) and ($_POST['password']===$pass)) {
			header('Location:products.php');
			}else{
			echo "Autorizacija ne valja";
}
}
?>
			</div>
		</div>
	</div>
</body>
</html>
