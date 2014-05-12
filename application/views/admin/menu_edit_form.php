<section>

	<h2 class="title">Menu wijzigen</h2>
	<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
	<div class="clear"></div>
	
	<?php foreach ($wijzigquery->result() as $row) { ?>

		<form method="post" action="/admin/menu/editsave" accept-charset="utf-8" enctype="multipart/form-data">
			<input type="hidden" name="menuid" value="<?php echo $row->menuid; ?>" />
			<input type="text" name="name" value="<?php echo $row->name; ?>" />
			<input type="text" name="price" value="<?php echo $row->price; ?>" />
			<select name = "gerechttypeid" value="<?php echo $row->gerechttypeid; ?>">
               <option value = "1">Voorgerecht</option>
               <option value = "2" >Hoofdgerecht</option>
               <option value = "3">Nagerecht</option>
             </select></br>

			<input type="hidden" name="restaurantid" value="<?php echo $row->restaurantid; ?>" />

	<?php }?>
			<input type="submit" value="Opslaan" />
		</form>

</section>
