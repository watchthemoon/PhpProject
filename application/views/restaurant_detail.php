	<h1><?php echo $query->name; ?></h1>
	<section id="restaurants-view">	
			<div class="details">
				<img src="<?php echo site_url('upload/restaurants/'.$query->image.''); ?>" alt="<?php echo $query->image; ?>">
				<h2>Informatie</h2>
				<p>Straat: <?php echo $query->address; ?></p>
				<p>Stad: <?php echo $query->city; ?></p>
				<p>Land: <?php echo $query->country; ?></p>
				<h2>Beschrijving</h2>
				<p><?php echo $query->description; ?></p>

			</div>
	</section>
<div id="addRestaurant">
		<form action="/reserve/view/<?php echo $query->restaurantid;?>" method="post">
			<input type="submit" value="Reserveer"/>
		</form>
</div>
