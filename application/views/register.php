<header>
	<h1>Welkom bij Anjalaya</h1>
</header>
<div id="rightside">

	<section id="signup">

		<h2>Nieuw bij Anjalaya? <span>Registreer nu</span></h2>

		<form action="/register/save/" method="post">

			<input type="text" name="firstname" placeholder="Voornaam"/><?php if ($errors['firstname'] != ''){ echo $errors['firstname']; } ?>
			<input type="text" name="name" placeholder="Achternaam"/>
			<input type="email" name="email" placeholder="Email"/>
			<input type="text" name="phonenumber" placeholder="Telefoonnummer"/>
			<input type="text" name="birthdate" placeholder="Geboortedatum"/>
			<input type="password" name="password" placeholder="Paswoord"/>

			<input type="checkbox" name="isAdmin" value="yes" id="isAdmin">
			<label for="isAdmin">Ik ben een restauranthouder</label>

			<input type="submit" value="Registreren"/>

		</form>

	</section>

</div>
