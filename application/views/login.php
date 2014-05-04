<h1>Welkom bij Anjalaya</h1>
<div id="rightside">

	<section id="login">

		<h2>Welkom bij Anjalaya</h2>

		<form action="/login/save/" method="post" autocomplete="off">
			<input required type="text" name="email" placeholder="Email" value="<?php echo $post['email']; ?>" /><?php if ($errors['email'] != ''){ echo $errors['email']; } ?>
			<input required type="password" name="password" placeholder="Paswoord"/><?php if ($errors['password'] != ''){ echo $errors['password']; } ?>

			<input type="submit" name="btnLogin" value="Inloggen"/>
		</form>

		<p>Nog geen account? <a href="/register">Registreer</a></p>

	</section>

</div>