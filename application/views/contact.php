<h1>Contact</h1>
<div id="rightside">

	<section id="home">

		<p>Voor verdere vragen gelieve het contact formulier hieronder in te vullen en door te sturen.</p>
		<form action="/contact/mail/" method="post" autocomplete="off" name="contactform">

			<input required type="text" name="FirstnameContact" placeholder="Voornaam"><?php if ($errors['FirstnameContact'] != ''){ echo $errors['FirstnameContact']; } ?>
			<input required type="text" name="LastnameContact" placeholder="Achternaam"><?php if ($errors['LastnameContact'] != ''){ echo $errors['LastnameContact']; } ?>
			<input required type="text" name="EmailContact" placeholder="Emailadres"><?php if ($errors['EmailContact'] != ''){ echo $errors['EmailContact']; } ?>
			<input required type="text" name="TelephoneContact" placeholder="Telefoonnummer"><?php if ($errors['TelephoneContact'] != ''){ echo $errors['TelephoneContact']; } ?>
			<input required type="text" name="TitelContact" placeholder="Onderwerp"><?php if ($errors['TitelContact'] != ''){ echo $errors['TitelContact']; } ?>
			<textarea name="MessageContact" placeholder="Berichtemail" id="MessageContact"></textarea><?php if ($errors['MessageContact'] != ''){ echo $errors['MessageContact']; } ?>

			<input type="submit" value="Verstuur"/>
		</form>

	</section>

</div>