<section class="contain">
<h1>Reservatie voltooien</h1>	
	<div class="details">
		<h2>Informatie</h2>
		<p>Tafelnaam: <?php echo $this->session->userdata('tafelid'); ?></p>
		<p>Aantal plaatsen: <?php echo $this->session->userdata('aantal'); ?></p>


		<h2>Voltooi je reservatie!</h2>
			<form action="reserve/customer" method="post" autocomplete="off">
				<input type="submit" name="btnLogin" value="Reserveer"/>
			</form>
	</div>
</section>