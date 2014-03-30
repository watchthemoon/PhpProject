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
	
	<section id="signup">
	
		<h2>Nieuw bij Restaurant Business? <span>Registreer nu</span></h2>
		<form action="" method="post">
		<input type="text" name="firstname" placeholder="Voornaam" />
		<input type="text" name="name" placeholder="Achternaam" />
		<input type="email" name="email" placeholder="Email" />
		<input type="text" name="phonenumber" placeholder="Telefoonnummer" />
		<input type="text" name="birthdate" placeholder="Geboortedatum" />
		<input type="password" name="password" placeholder="Paswoord" />
		<input type="checkbox" name="isAdmin" value="yes" id="isAdmin">
		<label for="isAdmin">Restauranthouder</label>
		<input type="submit" name="btnSignup" value="Registreren" />
		</form>
		
	</section>
	</div>
</body>
</html>