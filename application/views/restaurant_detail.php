	<section class="contain">

			<div class="info">
				<img src="<?php echo site_url('upload/restaurants/header/'.$query->imageHeader.''); ?>" alt="<?php echo $query->image; ?>">
				<h2><?php echo $query->name . ' in '.$query->city . ' (' .$query->country.')'; ?></h2>
				<div id="addRestaurant">
				<form action="/reserve/view/<?php echo $query->restaurantid;?>" method="post">
					<input type="submit" value="Reserveer"/>
				</form>

				<h3>Informatie</h3>

				<p>Reserveer nu met je account, nog geen account? <a href="/register">registreer hier!</a></p>
			</div>
				<div class="info">
				<h2>Informatie</h2>

				<p>Straat: <?php echo $query->address; ?></p>
				<p>Stad: <?php echo $query->city; ?></p>
				<p>Land: <?php echo $query->country; ?></p>
				<h3>Beschrijving</h3>
				<p><?php echo $query->description; ?></p>
				<h3>Menu</h3>
				<h4>Voorgerechten</h4>
				<?php foreach ($voorgerecht as $vg) { ?>
				<p><?php echo $vg->name; ?> -  <?php echo $vg->price; ?></p>
				<?php } ?>
				<h4>Hoofdgerechten</h4>
				<?php foreach ($hoofdgerecht as $hg) { ?>
				<p><?php echo $hg->name; ?> -  <?php echo $hg->price; ?></p>
				<?php } ?>
				<h4>Nagerechten</h4>
				<?php foreach ($nagerecht as $ng) { ?>
				<p><?php echo $ng->name; ?> -  <?php echo $ng->price; ?></p>
				<?php } ?>
				</div>
			</div>
			<div class="clear"></div>
	</section>
