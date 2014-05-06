	<section class="contain">

			<div class="details">
				<img src="<?php echo site_url('upload/restaurants/'.$query->image.''); ?>" alt="<?php echo $query->image; ?>">
				<h1><?php echo $query->name; ?></h1>
				<div id="addRestaurant">
				<form action="/reserve/view/<?php echo $query->restaurantid;?>" method="post">
					<input type="submit" value="Reserveer"/>
				</form>
				<p>Reserveer nu met je account, nog geen account? <a href="/register">registreer hier!</a></p>
			</div>
				<div class="info">
				<h2>Informatie</h2>
				<p>Straat: <?php echo $query->address; ?></p>
				<p>Stad: <?php echo $query->city; ?></p>
				<p>Land: <?php echo $query->country; ?></p>
				<h2>Beschrijving</h2>
				<p><?php echo $query->description; ?></p>
				<h2>Menu</h2>
				<h3>Voorgerechten</h3>
				<?php foreach ($voorgerecht as $vg) { ?>
				<p><?php echo $vg->name; ?> -  <?php echo $vg->price; ?></p>
				<?php } ?>
				<h3>Hoofdgerechten</h3>
				<?php foreach ($hoofdgerecht as $hg) { ?>
				<p><?php echo $hg->name; ?> -  <?php echo $hg->price; ?></p>
				<?php } ?>
				<h3>Nagerechten</h3>
				<?php foreach ($nagerecht as $ng) { ?>
				<p><?php echo $ng->name; ?> -  <?php echo $ng->price; ?></p>
				<?php } ?>
				</div>
			</div>
	</section>
