	
	<section>	
			<h2><?php echo $query->name; ?></h2>
			<div class="details">
				<img src="<?php echo site_url('../upload/restaurants/'.$query->image.''); ?>" alt="<?php echo $query->image; ?>">
				<h2>Informatie</h2>
				<p>Straat: <?php echo $query->address; ?></p>
				<p>Stad: <?php echo $query->city; ?></p>
				<p>Land: <?php echo $query->country; ?></p>
				<h2>Beschrijving</h2>
				<p><?php echo $query->description; ?></p>

			</div>
			<div id="addRestaurant">
		<form action="" method="post">
			<input type="submit" value="Wijzigen"/>
		</form>
</div>
	</section>

