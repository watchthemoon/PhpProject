<section>
	<?php if ($table->tableid != 0){ ?>
		<h2 class="title">Wijzig een tafel</h2>
	<?php } else { ?>
		<h2 class="title">Voeg een tafel toe</h2>
	<?php } ?>
	<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
	<div class="clear"></div>

	<form action="/admin/tables/save" method="post" autocomplete="off">
		<label for="name">Tafelnummer:</label>
		<input required type="text" name="name" placeholder="Tafelnummer" value="<?php echo $table->name;?>" />

		<label for="amount">Aantal zitplaatsen:</label>
		<input required type="text" name="amount" placeholder="Aantal zitplaatsen" value="<?php echo $table->amountseats;?>" />

		<input type="hidden" name="tableid" value="<?php echo $table->tableid;?>" />
		<input type="hidden" name="restaurantid" value="<?php echo $restaurantid;?>" />
		<input type="hidden" name="coordinates" value="<?php echo $data['coordinates']; ?>" />

		<?php if ($table->tableid != 0){ ?>
			<input type="submit" value="Opslaan" />
			<input type="button" value="Verwijder deze tafel" class="delete" onclick="deletetable(<?php echo $table->tableid; ?>,<?php echo $restaurantid;?>);" />
		<?php } else { ?>
			<input type="submit" value="Opslaan" />
		<?php } ?>
	</form>
</section>

<script>
	function deletetable(tableid,restaurantid){
		if(confirm('Weet u zeker dat u deze tafel wilt verwijderen?')){
			location.href = '/admin/tables/delete/' + tableid + '/' + restaurantid;
		}
	}
</script>