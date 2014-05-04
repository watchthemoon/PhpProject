<section>


	
				<h1>Menu Wijzigen</h1>
	<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
	
		<form method="post" action="/admin/menu/editsave" accept-charset="utf-8" enctype="multipart/form-data">
			<input type="hidden" name="menuid" placeholder="<?php echo $wijzigquery->menuid; ?>" />
			<input type="text" name="name" placeholder="<?php echo $wijzigquery->name; ?>" />
			<input type="text" name="price" placeholder="<?php echo $wijzigquery->price; ?>" />
			<select name = "gerechttypeid" value="<?php echo $wijzigquery->gerechttypeid; ?>">
               <option value = "1">Voorgerecht</option>
               <option value = "2" >Hoofdgerecht</option>
               <option value = "3">Nagerecht</option>
             </select></br>

			<input type="hidden" name="restaurantid" value="<?php echo $wijzigquery->restaurantid; ?>" />
		
			<button type="submit">Menu wijzigen</button>
		</form>
