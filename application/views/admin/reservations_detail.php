<section>

	<?php if ($data['gereserveerd'] == 'bezet'){?>
		<h2 class="title">Wijzig/verwijder een reservatie</h2>
		<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>

	<?php foreach ($query->result() as $row) { ?>

	<form action="/admin/reservations/editRes" method="post">
	<input type="text" name="aantal" value="<?php echo $row->peoplenr?>"/>
	<input type="text" name="description" value="<?php echo $row->description?>" placeholder="Beschrijving" /> 
	<input type="hidden" name="reserveid" value="<?php echo $row->reserveid?>" />
	<input type="hidden" name="restaurantid" value="<?php echo $row->restaurantid?>"/>
	<input type="submit" name="btnDelete" value="Wijzig"/>
	</form>
		<form action="/admin/reservations/deleteRes" method="post">
	<input type="hidden" name="restaurantid" value="<?php echo $row->restaurantid?>"/>
	<input type="hidden" name="reserveid" value="<?php echo $row->reserveid?>" />
	<input type="submit" name="btnDelete" value="Verwijder"/>
		</form>


	<?php }} else { ?>
		<h2 class="title">Maak een nieuwe reservatie aan</h2>

	<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
	<form action="/admin/reservations/reservetable" method="post">
	<input type="text" name="aantal" placeholder="Aantal personen"/>
	<input type="text" name="description" placeholder="Beschrijving"/>
	<input type="hidden" name="restaurantid" value="<?php echo $data['restaurantid'] ?>"/>
	<input type="hidden" name="tableid" value="<?php echo $data['tableid']?>"/>
	<input type="hidden" name="resdate" value="<?php echo $data['resdate']?>" />
	<input type="submit" name="btnLogin" value="Reserveer"/>
	</form>
	<?php } ?>


</section>