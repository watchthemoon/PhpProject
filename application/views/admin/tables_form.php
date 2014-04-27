<section>
	<h2>Voeg een tafel toe</h2>
	<form action="/admin/tables/save" method="post">
		<input type="text" name="name" placeholder="Tafelnummer" />
		<input type="text" name="amount" placeholder="Aantal zitplaatsen" />

		<input type="hidden" name="restaurantid" value="<?php echo $data['restaurantid'] ?>" />
		<input type="hidden" name="coordinates" value="<?php echo $data['coordinates'] ?>" />

		<input type="submit" value="Opslaan" />
	</form>
</section>