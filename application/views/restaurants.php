<section class="contain">
	<h2>Restaurant Overzicht</h2>
		<?php
		if (!is_array($restaurants)){
			?>Oh no!, geen restaurants gevonden, dan maar zelf koken!<?php
		}else{
		foreach ($restaurants as $item) { ?>

			<div class="res">
				<img src="<?php echo 'upload/restaurants/overzicht/' . $item->image; ?>" class="resfoto" alt="<?php echo $item->image; ?>">
				<h2><?php echo $item->name; ?></h2>
				<h3><?php echo $item->city; ?></h3>
				<p><?php
				if(strlen($item->description) > 100 ){
				$des = strpos($item->description, ' ' , 100);
				 echo substr($item->description,0,$des). "..."; }else{
				 	echo $item->description;}?></p>
				<a href="<?php echo site_url('restaurants/detail/'.$item->restaurantid.''); ?>" class="btnmeerinfo">Meer info</a>
			</div>
			<?php
			}
		}
		?>
		<div class="clear"></div>
	</section>