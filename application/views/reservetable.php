<section class="contain">
<h1>Reservatie voltooien</h1>	
	<div class="details">
		<h2>Informatie</h2>
		<p>Tafelnaam: <?php echo $tafelid; ?></p>
		<p>Aantal plaatsen: <?php echo $this->aantal; ?></p>

		<?php echo $this->user; ?>
		<?php echo $this->restaurantid; ?>


		<h2>Voltooi je reservatie!</h2>
			<form action="reserve/customer" method="post" autocomplete="off">
				<input type="submit" name="btnLogin" value="Reserveer"/>
			</form>
	</div>
</section>