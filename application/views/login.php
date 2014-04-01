<header>

	<h1>Welkom bij Anjalaya</h1>

</header>

<div id="rightside">

	<section id="login">

		<h2>Welkom bij Anjalaya</h2>

		<form action="/login/save/" method="post" autocomplete="off">
			<input type="text" name="email" placeholder="Email"/><?php if ($errors['email'] != ''){ echo $errors['email']; } ?>
			<input type="password" name="password" placeholder="Paswoord"/><?php if ($errors['password'] != ''){ echo $errors['password']; } ?>

			<input type="submit" name="btnLogin" value="Inloggen"/>
		</form>

		<p>Nog geen account? <a href="/register">Registreer</a></p>

	</section>

</div>