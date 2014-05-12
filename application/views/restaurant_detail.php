	<section >

			<div id="info" class="contain">
				<img src="<?php echo site_url('upload/restaurants/header/'.$query->imageHeader.''); ?>" alt="<?php echo $query->image; ?>">
				<h2><?php echo $query->name . ' in '.$query->city . ' (' .$query->country.')'; ?></h2>
				<h3>Beschrijving</h3>
				<p><?php echo $query->description; ?></p>
				<h3>Informatie</h3>
				<p>Straat: <?php echo $query->address; ?></p>
				<p>Stad: <?php echo $query->city; ?></p>
				<p>Land: <?php echo $query->country; ?></p>
				<h3>Menu</h3>
				<h4>Voorgerechten</h4>
				<?php foreach ($voorgerecht as $vg) { ?>
				<p><?php echo $vg->name; ?> -  <?php echo $vg->price . ' euro'; ?></p>
				<?php } ?>
				<h4>Hoofdgerechten</h4>
				<?php foreach ($hoofdgerecht as $hg) { ?>
				<p><?php echo $hg->name; ?> -  <?php echo $hg->price . ' euro'; ?></p>
				<?php } ?>
				<h4>Nagerechten</h4>
				<?php foreach ($nagerecht as $ng) { ?>
				<p><?php echo $ng->name; ?> -  <?php echo $ng->price . ' euro'; ?></p>
				<?php } ?>
				</div>
				<div id="rsvblock" class="contain">
				<h3>Reservatie</h3>
				<p>Reserveer nu met je account! Nog geen account? <a href="/register">Registreer hier!</a></p>
				<form action="/reserve/view/<?php echo $query->restaurantid;?>" method="post">
					<input type="submit" value="Reserveer"/>
				</form>
				
				</div>
			<div class="clear"></div>
	</section>
