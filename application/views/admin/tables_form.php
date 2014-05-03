<section>
	<?php if ($table->tableid != 0){ ?>
		<h2>Wijzig een tafel</h2>
	<?php } else { ?>
		<h2>Voeg een tafel toe</h2>
	<?php } ?>
	<form action="/admin/tables/save" method="post" autocomplete="off">
		<label for="name">Tafelnummer:</label>
		<input type="text" name="name" placeholder="Tafelnummer" value="<?php echo $table->name;?>" />

		<label for="amount">Aantal zitplaatsen:</label>
		<input type="text" name="amount" placeholder="Aantal zitplaatsen" value="<?php echo $table->amountseats;?>" />

		<input type="hidden" name="tableid" value="<?php echo $table->tableid;?>" />
		<input type="hidden" name="restaurantid" value="<?php echo $restaurantid;?>" />
		<input type="hidden" name="coordinates" value="<?php echo $data['coordinates']; ?>" />

		<input type="submit" value="Opslaan" />
		<a href="#" class="delete" onclick="deletetable(<?php echo $table->tableid; ?>,<?php echo $restaurantid;?>);">Verwijder tafel</a>

		<a onclick="closeWindow();" href="#">Venster sluiten</a>
	</form>
</section>

<script>
	function deletetable(tableid,restaurantid){
		if(confirm('Weet u zeker dat u deze tafel wilt verwijderen?')){
			location.href = '/admin/tables/delete/' + tableid + '/' + restaurantid;
		}
	}
</script>