	<?$row = $query->row();?>
	<h1><?php echo $row->name; ?></h1>
	<section id="restaurants-view">	
			<div class="details">
				<img src="<?php echo site_url('upload/restaurants/'.$row->image.''); ?>" alt="<?php echo $row->image; ?>">
				<h2>Informatie</h2>
				<p>Straat: <?php echo $row->address; ?></p>
				<p>Stad: <?php echo $row->city; ?></p>
				<p>Land: <?php echo $row->country; ?></p>
				<h2>Beschrijving</h2>
				<p><?php echo $row->description; ?></p>

			</div>
	</section>
<div id="addRestaurant">
		<form action="/reserve" method="post">
			<input type="submit" value="Reserveer"/>
		</form>
</div>
