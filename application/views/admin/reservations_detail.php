<section>

	<div class="close"><a onclick="closeWindow();" href="#">Sluit venster</a></div>
	<h2>Aantal personen?</h2>
	<form action="/admin/reservations/reservetable" method="post">
	<input type="text" name="aantal" placeholder="Aantal"/>
	<input type="hidden" name="restaurantid" value="<?php echo $data['restaurantid'] ?>"/>
	<input type="hidden" name="tableid" value="<?php echo $data['tableid']?>"/>
	<input type="hidden" name="resdate" value="<?php echo $data['resdate']?>" />
	<input type="submit" name="btnLogin" value="Reserveer"/>
	</form>

</section>