<section>
	<?php if ($online == true) { ?>

		<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
		<h2>Aantal personen?</h2>
		<form action="/reservations/reservetablecustomer2" method="post" autocomplete="off">
			<div class="info">
				Selecteer hieronder het aantal personen waar u voor wilt reserveren.<br />
				Heeft deze tafel niet genoeg plaatsen? Sluit dan dit venster en zoek een andere tafel uit wel genoeg zitplaatsen.
			</div>

			<b>Gekozen tijdstip:</b><br />
			<?php echo $restime;?><br />
			<br />

			<b>Aantal:</b><br />
			<select name="aantal" id="aantal">
				<?php for($seats = 1; $seats <= $vastaantal; $seats++){ ?>
					<option value="<?php echo $seats;?>"><?php echo $seats;?></option>
				<?php } ?>
			</select>
			<?php
			if ($errors['aantal'] != '') {
				echo $errors['aantal'];
			}
			?>

			<input type="hidden" name="tableid" value="<?php echo $tableid; ?>">
			<input type="hidden" name="restaurantid" value="<?php echo $restaurantid; ?>">
			<input type="hidden" name="resdate" value="<?php echo $resdate; ?>">
			<input type="hidden" name="restime" value="<?php echo $restime; ?>">
			<input type="hidden" name="vastaantal" value="<?php echo $vastaantal; ?>">

			<input type="submit" name="btnLogin" value="Reserveer"/>
		</form>

	<?php } else { ?>

		<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
		<div id="inloggen">

			<section id="login">

				<h2>Aantal personen?</h2>
				<form action="/reservations/reservetablecustomer1" method="post" autocomplete="off">

					<div class="info">
						Selecteer hieronder het aantal personen waar u voor wilt reserveren.<br />
						Heeft deze tafel niet genoeg plaatsen? Sluit dan dit venster en zoek een andere tafel uit wel genoeg zitplaatsen.
					</div>

					<b>Gekozen tijdstip:</b><br />
					<?php echo $restime;?><br />
					<br />

					<b>Aantal:</b><br />
					<select name="aantal" id="aantal">
						<?php for($seats = 1; $seats <= $vastaantal; $seats++){ ?>
							<option value="<?php echo $seats;?>"><?php echo $seats;?></option>
						<?php } ?>
					</select>
					<?php
					if ($errors['aantal'] != '') {
						echo $errors['aantal'];
					}
					?>
					<br />
					<br />
					<br />

					<h2>Snel reserveren via je login!</h2>
					<input type="text" name="email" placeholder="Email" value="<?php echo $post['email']; ?>"/>
					<?php
					if ($errors['email'] != '') {
						echo $errors['email'];
					}
					?>
					<input type="password" name="password" placeholder="Paswoord"/>
					<?php
					if ($errors['password'] != '') {
						echo $errors['password'];
					}
					?>

					<input type="hidden" name="tableid" value="<?php echo $tableid; ?>">
					<input type="hidden" name="restaurantid" value="<?php echo $restaurantid; ?>">
					<input type="hidden" name="resdate" value="<?php echo $resdate; ?>">
					<input type="hidden" name="restime" value="<?php echo $restime; ?>">
					<input type="hidden" name="vastaantal" value="<?php echo $vastaantal; ?>">

					<input type="submit" name="btnLogin" value="Reserveer"/>
				</form>
			</section>
		</div>

	<?php } ?>
</section>