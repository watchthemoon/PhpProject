<h1>Restaurant Overzicht</h1>


	<section id="restaurants-view">
		<?php foreach ($query as $row) { ?>
			<div class="res">
				<h2><?php echo $row->name; ?></h2>
				<!--<img src="../assets/images/delete.jpg" id="delete<?php echo $row->restaurantid;?>" class="icon-delete" alt="delete">-->
				<form action="/admin/restaurants/delete" method="post">
				<input type="hidden" name="restaurantid" value="<?php echo $row->restaurantid;?>" />
				<input type="submit" value="delete"/>
				</form>
				<img src="<?php echo '../upload/restaurants/' . $row->image; ?>" class="resfoto" alt="<?php echo $row->image; ?>">
				<p><?php echo $row->description; ?></p>
				<a href="<?php echo site_url('admin/restaurants/detail/'.$row->restaurantid.''); ?>">Meer info</a>

				<div>
					<a href="/admin/menu/view/<?php echo $row->restaurantid;?>" class="btn">Menu's beheren</a>
					<a href="/admin/tables/view/<?php echo $row->restaurantid;?>" class="btn">Tafels beheren</a>
				</div>

			</div>
		<?php } ?>
	<div class="clear"></div>
	</section>

<div>
	<a href="/admin/restaurants/form" class="btn">Restaurant toevoegen</a>
</div>
<script type="text/javascript">
	$(".icon-delete").on('click',function(){
		$.ajax({
        type: "POST",
        url: "/admin/restaurants/delete",
        data: {'restaurantid': this.id.replace('delete','')},  // fix: need to append your data to the call
        success: function (data) {
        }
    });
	});
</script>


