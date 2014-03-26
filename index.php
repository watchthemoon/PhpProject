<?php
	include_once('classes/Db.class.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
</head>
<body>
	<section id="login">
		<form action="" method="post">
		<input type="text" name="email" placeholder="Email" />
		<input type="password" name="password" placeholder="Paswoord" />

		<input type="submit" name="btnLogin" value="Sign in" />
		</form>
		
	</section>	
	
	<section id="signup">
	
		<h2>Nieuw bij Restaurant Business? <span>Registreer nu</span></h2>
		<form action="" method="post">
		<input type="text" name="firstname" placeholder="Firstname" />
		<input type="text" name="name" placeholder="Lastname" />
		<input type="email" name="email" placeholder="Email" />
		<input type="text" name="phonenumber" placeholder="Phone number" />
		<input type="text" name="birthdate" placeholder="Birthdate" />
		<input type="password" name="password" placeholder="Paswoord" />
		<input type="submit" name="btnSignup" value="Registreren" />
		</form>
		
	</section>
</body>
</html>