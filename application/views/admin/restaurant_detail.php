	
	<section>	
			
			<div id="info" class="contain">
				<img src="<?php echo site_url('../upload/restaurants/header/'.$query->imageHeader.''); ?>" alt="<?php echo $query->imageHeader; ?>">
				<h2><?php echo $query->name . ' in '.$query->city . ' (' .$query->country.')'; ?></h2>
				<h3>Informatie</h3>
				<p>Straat: <?php echo $query->address; ?></p>
				<p>Stad: <?php echo $query->city; ?></p>
				<p>Land: <?php echo $query->country; ?></p>
				<h3>Beschrijving</h3>
				<p><?php echo $query->description; ?></p>
			</div>
		<div id="rsvblock" class="contain">
		<h3>Beheer</h3>
					<a href="/admin/menu/view/<?php echo $query->restaurantid;?>" class="btn">Menu's beheren</a>
					<a href="/admin/tables/view/<?php echo $query->restaurantid;?>" class="btn">Tafels beheren</a>
					<a href="/admin/reservations/view/<?php echo $query->restaurantid;?>" class="btn">Reservaties bekijken</a>
				
				</div>
				<div class="clear"></div>
	</section>

