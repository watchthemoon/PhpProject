<section>

	<h2 class="title">Menu toevoegen</h2>
	<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
	<div class="clear"></div>

		<form method="post" action="/admin/menu/save">
	
			<input type="text" name="name" placeholder="Naam gerecht" />
			<input type="text" name="price" placeholder="Prijs gerecht" />
			<select name = "gerechttypeid">
               <option value = "1">Voorgerecht</option>
               <option value = "2">Hoofdgerecht</option>
               <option value = "3">Nagerecht</option>
             </select></br>

			<input type="hidden" name="restaurantid" value="<?php echo $data['restaurantid'] ?>" />

			<input type="submit" value="Opslaan" />
		</form>

</section>
