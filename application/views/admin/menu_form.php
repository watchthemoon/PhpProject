<section>


				<h1>Menu toevoegen</h1>
		<form method="post" action="/admin/menu/save">
	
			<input type="text" name="name" placeholder="Naam gerecht" />
			<input type="text" name="price" placeholder="Prijs gerecht" />
			<select name = "gerechttypeid">
               <option value = "1">Voorgerecht</option>
               <option value = "2">Hoofdgerecht</option>
               <option value = "3">Nagerecht</option>
             </select></br>

			<input type="hidden" name="restaurantid" value="<?php echo $data['restaurantid'] ?>" />
		
			<button type="submit">Menu toevoegen</button>
		</form>

</section>


<!--	<h2>Voeg een tafel toe</h2>
	<form action="/admin/tables/save" method="post">
		<input type="text" name="name" placeholder="Tafelnummer" />
		<input type="text" name="amount" placeholder="Aantal zitplaatsen" />

		<input type="hidden" name="restaurantid" value="<//?php echo $data['restaurantid'] ?>" />
		<input type="hidden" name="coordinates" value="<//?php echo $data['coordinates'] ?>" />

		<input type="submit" value="Opslaan" />
	</form> -->