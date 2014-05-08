	
	<section class="contain">	
			
			<div class="details">
				<img src="<?php echo site_url('../upload/restaurants/header/'.$query->imageHeader.''); ?>" alt="<?php echo $query->imageHeader; ?>">
				
			</div>
			<div class="info">
				<h2><?php echo $query->name; ?></h2>
				<h2>Informatie</h2>
				<p>Straat: <?php echo $query->address; ?></p>
				<p>Stad: <?php echo $query->city; ?></p>
				<p>Land: <?php echo $query->country; ?></p>
				<h2>Beschrijving</h2>
				<p><?php echo $query->description; ?></p>
			</div>
			<div class="clear"></div>
			<div id="addRestaurant">
		<form action="" method="post">
			<input type="submit" value="Wijzigen"/>
		</form>
		</div>
		<div>
					<a href="/admin/menu/view/<?php echo $query->restaurantid;?>" class="btn">Menu's beheren</a>
					<a href="/admin/tables/view/<?php echo $query->restaurantid;?>" class="btn">Tafels beheren</a>
					<a href="/admin/reservations/view/<?php echo $query->restaurantid;?>" class="btn">Reservaties bekijken</a>
				
				</div>
	</section>

