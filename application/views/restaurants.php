<h1>Restaurant Overzicht</h1>
<section id="restaurants-view">
	<?php
	if (!is_array($restaurants)){ ## Grr maak ik de fout weer!
		?>Oh no!, geen restaurants gevonden, dan maar zelf koken!<?php
	}else{
		foreach ($restaurants as $item) {
		}
	?>

	<section id="restaurants-view">
		<?php foreach ($query as $row) { ?>
			<div class="res">
				<img src="<?php echo 'upload/restaurants/' . $item->image; ?>" class="resfoto" alt="<?php echo $item->image; ?>">
				<h2><?php echo $item->name; ?></h2>
				<h3><?php echo $item->city; ?></h3>
				<p><?php echo $item->description; ?></p>
				<a href="<?php echo site_url('restaurants/detail/'.$item->restaurantid.''); ?>" class="btnmeerinfo">Meer info</a>
			</div>
			<?php
		}
	}
	?>
	<div class="clear"></div>
</section>