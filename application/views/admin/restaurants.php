<h1>Restaurant Overzicht</h1>


	<section id="restaurants-view">
		<?php foreach ($query->result() as $row) { ?>
			<div class="res">
				<h2><?php echo $row->name; ?></h2>
				<img src="<?php echo '../upload/restaurants/' . $row->image; ?>" alt="<?php echo $row->image; ?>">
				<p><?php echo $row->description; ?></p>
				<a href="<?php echo site_url('restaurants/detail/'.$row->restaurantid.''); ?>">Meer info</a>

				<div>
					<a href="/admin/menu" class="btn">Menu's beheren</a>
					<a href="/admin/tables" class="btn">Tafels beheren</a>
				</div>

			</div>
		<?php } ?>
	<div class="clear"></div>
	</section>

<div>
	<a href="/admin/restaurants/form" class="btn">Restaurant toevoegen</a>
</div>


