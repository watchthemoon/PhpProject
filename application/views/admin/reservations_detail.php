<section>

	<?php if ($data['gereserveerd'] == 'bezet') { ?>
		<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
		<h2>Wijzig/verwijder een reservatie</h2>
		<div class="clear"></div>

		<?php foreach ($query->result() as $row) { ?>

			<form action="/admin/reservations/deleteRes" method="post">

				<input type="hidden" name="restaurantid" value="<?php echo $row->restaurantid ?>"/>
				<input type="hidden" name="reserveid" value="<?php echo $row->reserveid ?>"/>

				<input type="submit" class="inline fright" name="btnDelete" value="Verwijder"/>

			</form>

			<form action="/admin/reservations/editRes" method="post">

				<select name="aantal" id="aantal" class="inline small">
					<?php for($seats = 1; $seats <= $row->amountseats; $seats++){ ?>
						<option <?php if ($row->peoplenr == $seats){?>selected="selected"<?php } ?> value="<?php echo $seats;?>"><?php echo $seats;?></option>
					<?php } ?>
				</select>
				<input type="text" name="description" class="inline large" value="<?php echo $row->description ?>" placeholder="Beschrijving" />
				<select name="time" id="timeselector">
					<option <?php if (date("H:i",strtotime($row->date)) == '12:00'){ ?>selected="selected"<?php }?> value="12:00">12:00 - 14:00</option>
					<option <?php if (date("H:i",strtotime($row->date)) == '14:00'){ ?>selected="selected"<?php }?> value="14:00">14:00 - 16:00</option>
					<option <?php if (date("H:i",strtotime($row->date)) == '16:00'){ ?>selected="selected"<?php }?> value="16:00">16:00 - 18:00</option>
					<option <?php if (date("H:i",strtotime($row->date)) == '18:00'){ ?>selected="selected"<?php }?> value="18:00">18:00 - 20:00</option>
					<option <?php if (date("H:i",strtotime($row->date)) == '20:00'){ ?>selected="selected"<?php }?> value="20:00">20:00 - 22:00</option>
				</select>
				<input type="submit" class="inline" name="btnDelete" value="Wijzig"/>

				<input type="hidden" name="reserveid" value="<?php echo $row->reserveid ?>"/>
				<input type="hidden" name="restaurantid" value="<?php echo $row->restaurantid ?>"/>

			</form>
			<div class="clear"></div>

		<?php } ?>
	<?php } else { ?>
		<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
		<h2 class="title">Maak een nieuwe reservatie aan</h2>
		<div class="clear"></div>
		<form action="/admin/reservations/reservetable" method="post">

			<b>Aantal:</b><br />
			<select name="aantal" id="aantal">
				<?php for($seats = 1; $seats <= $amountseats; $seats++){ ?>
					<option value="<?php echo $seats;?>"><?php echo $seats;?></option>
				<?php } ?>
			</select>
			<?php
			if ($errors['aantal'] != '') {
				echo $errors['aantal'];
			}
			?>

			<input type="text" name="description" placeholder="Beschrijving"/>

			<input type="hidden" name="restaurantid" value="<?php echo $data['restaurantid'] ?>"/>
			<input type="hidden" name="tableid" value="<?php echo $data['tableid'] ?>"/>
			<input type="hidden" name="resdate" value="<?php echo $data['resdate'] ?>"/>
			<input type="hidden" name="restime" value="<?php echo $data['restime'] ?>"/>

			<input type="submit" name="btnLogin" value="Reserveer"/>

		</form>
	<?php } ?>


</section>