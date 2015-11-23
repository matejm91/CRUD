<?php
  $user = "";
  $pass = "";
  $validated = false;

  if ($_POST)
  {
    $user = $_POST['username'];
    $pass = $_POST['password'];
  }

  session_start();
  if($user!=""&&$pass!="")
  {
    if($user=="**********"&&$pass=="**********") $validated = true;
    if($validated)
    {
      $_SESSION['login'] = "OK";
      $_SESSION['username'] = $user;
      $_SESSION['password'] = $pass;
      header('Location: products.php');
    }
    else
    {
      $_SESSION['login'] = "";
      echo "Invalid username or password.";
    }
  }
  else $_SESSION['login'] = "";
?>
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
	<h1>Prijavi se</h1>
	<br><p>Molimo unesite korisničko ime i šifru:</p></br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">	
<form action="index.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Prijavi se</button>
</form>

			</div>
		</div>
	</div>
</body>
</html>
