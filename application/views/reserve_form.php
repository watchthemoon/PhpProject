<section>
	<?php 
	if ($online == true){
	?>
	<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
	<h2>Aantal personen?</h2>
	<form action="/reservations/reservetablecustomer2" method="post" autocomplete="off">
		<input required type="text" name="aantal2" placeholder="Aantal"/>
		<input type="hidden" name="tableid" value="<?php echo $tableid; ?>">
		<input type="hidden" name="restaurantid" value="<?php echo $restaurantid; ?>">
		<input type="hidden" name="resdate" value="<?php echo $resdate; ?>">
		<input type="hidden" name="vastaantal" value="<?php echo $vastaantal; ?>">
		<input type="submit" name="btnLogin" value="Reserveer"/>

	</form>

	<?php 
	}
	else{
	?>

	<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
		<div id="inloggen">
		<section id="login">
			<h2>Aantal personen?</h2>

			<form action="/reservations/reservetablecustomer1" method="post" autocomplete="off">
				<input required type="text" name="aantal1" placeholder="Aantal"/><?php if ($errors['aantal1'] != ''){ echo $errors['aantal1']; } ?>
				</br>
				<h2>Snel reserveren via je login!</h2>
				<input type="text" name="email" placeholder="Email" value="<?php echo $post['email']; ?>" /><?php if ($errors['email'] != ''){ echo $errors['email']; } ?>
				<input type="password" name="password" placeholder="Paswoord"/><?php if ($errors['password'] != ''){ echo $errors['password']; } ?>

				<input type="submit" name="btnLogin" value="Reserveer"/>
				<input type="hidden" name="tableid" value="<?php echo $tableid; ?>">
				<input type="hidden" name="restaurantid" value="<?php echo $restaurantid; ?>">
				<input type="hidden" name="resdate" value="<?php echo $resdate; ?>">
				<input type="hidden" name="vastaantal" value="<?php echo $vastaantal; ?>">


			</form>
		</div>
		</br>
	</form>
	<?php 
	}
	?>

	
</section>