<section>

	<?php if ($data['gereserveerd'] == 'bezet'){?>
		<h2 class="title">Wijzig/verwijder een reservatie</h2>
		<h1>gereserveerd</h1>
		<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
	<form action="/admin/reservations/reservetable" method="post">
	<input type="text" name="aantal" placeholder="Aantal"/>
	<input type="hidden" name="restaurantid" value="<?php echo $data['restaurantid'] ?>"/>
	<input type="hidden" name="tableid" value="<?php echo $data['tableid']?>"/>
	<input type="hidden" name="resdate" value="<?php echo $data['resdate']?>" />
	<input type="submit" name="btnLogin" value="Reserveer"/>
	</form>
		

	<?php } else { ?>
		<h2 class="title">Maak een nieuwe reservatie aan</h2>

	<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
	<h2>Aantal personen?</h2>
	<form action="/admin/reservations/reservetable" method="post">
	<input type="text" name="aantal" placeholder="Aantal"/>
	<input type="hidden" name="restaurantid" value="<?php echo $data['restaurantid'] ?>"/>
	<input type="hidden" name="tableid" value="<?php echo $data['tableid']?>"/>
	<input type="hidden" name="resdate" value="<?php echo $data['resdate']?>" />
	<input type="submit" name="btnLogin" value="Reserveer"/>
	</form>
	<?php } ?>


</section>