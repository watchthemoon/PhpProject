<section>
	<?php 
	if ($online == true){
	?>
	<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
	<h2>Aantal personen?</h2>
	<form action="reserve/reservetable" method="post" autocomplete="off">
		<input required type="text" name="name" placeholder="Aantal"/>
		<input type="submit" name="btnLogin" value="Reserveer"/>
	</form>

	<?php 
	}
	else{
	?>

	<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
	<h2>Aantal personen?</h2>
	<form action="" method="post" autocomplete="off">
		<input required type="text" name="name" placeholder="Aantal"/>
	</form>


		<div id="inloggen">
		<section id="login">
			<h2 id="form">Snel reserveren via je log in!</h2>

			<form action="/login/savereserve/" method="post" autocomplete="off">
				<input type="text" name="email" placeholder="Email" value="<?php echo $post['email']; ?>" /><?php if ($errors['email'] != ''){ echo $errors['email']; } ?>
				<input type="password" name="password" placeholder="Paswoord"/><?php if ($errors['password'] != ''){ echo $errors['password']; } ?>

				<input type="submit" name="btnLogin" value="Reserveer"/>
			</form>
		</div>
		</br>
	</form>
	<?php 
	}
	?>
</section>