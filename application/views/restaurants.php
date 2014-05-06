<h1>Restaurant Overzicht</h1>


	<section id="restaurants-view">
		<?php foreach ($query as $row) { ?>
			<div class="res">
				<img src="<?php echo 'upload/restaurants/' . $row->image; ?>" class="resfoto" alt="<?php echo $row->image; ?>">
				<h2><?php echo $row->name; ?></h2>
				<h3><?php echo $row->city; ?></h3>
				<p><?php echo $row->description; ?></p>
				<a href="<?php echo site_url('restaurants/detail/'.$row->restaurantid.''); ?>" class="btnmeerinfo">Meer info</a>
			</div>
		<?php } ?>
		<div class="clear"></div>	
	</section>

