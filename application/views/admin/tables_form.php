<section>
	<?php if ($table->tableid != 0){ ?>
		<h2>Wijzig een tafel</h2>
	<?php } else { ?>
		<h2>Voeg een tafel toe</h2>
	<?php } ?>
	<form action="/admin/tables/save" method="post">
		<input type="text" name="name" placeholder="Tafelnummer" value="<?php echo $table->name;?>" />
		<input type="text" name="amount" placeholder="Aantal zitplaatsen" value="<?php echo $table->amountseats;?>" />

		<input type="hidden" name="restaurantid" value="<?php echo $restaurantid;?>" />
		<input type="hidden" name="coordinates" value="<?php echo $data['coordinates'] ?>" />

		<input type="submit" value="Opslaan" />
		<a onclick="closeWindow();" href="#">Venster sluiten</a>
	</form>
</section>