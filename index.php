<?php
	include_once('classes/Db.class.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<h1>Welkom bij Restaurant Business</h1>
	</header>
<div id="rightside">	
	<section id="login">
		<h2>Welkom bij Restaurant Business</h2>
		<form action="" method="post">
		<input type="text" name="email" placeholder="Email" />
		<input type="password" name="password" placeholder="Paswoord" />

		<input type="submit" name="btnLogin" value="Sign in" />
		</form>
		<p>Nog geen account? <a href="registratie.php">Registreer</a></p>
	</section>	

	</div>
</body>
</html>