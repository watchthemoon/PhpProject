<section>


	
				<h1>Menu toevoegen</h1>
	<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
	

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
