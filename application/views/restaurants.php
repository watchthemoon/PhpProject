<h1>Restaurant Overzicht</h1>


	<section id="restaurants-view">
		<?php foreach ($query->result() as $row) { ?>
			<div class="res">
				<h2><?php echo $row->name; ?></h2>
				<p><?php echo $row->description; ?></p>
				<a href="<?php echo site_url('restaurants/detail/'.$row->restaurantid.''); ?>">Meer info</a>
			</div>
		<?php } ?>	
	</section>
<div id="addRestaurant">
		<form action="/restaurants/form" method="post">
			<input type="submit" value="Restaurant Toevoegen"/>
		</form>
</div>

