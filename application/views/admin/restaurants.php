<h1>Restaurant Overzicht</h1>


	<section id="restaurants-view">
		<?php foreach ($query as $row) { ?>
			<div class="res">
				<h2><?php echo $row->name; ?></h2>
				<!--<img src="../assets/images/delete.jpg" id="delete<?php echo $row->restaurantid;?>" class="icon-delete" alt="delete">-->
				<a href="/admin/restaurants/edit/<?php echo $row->restaurantid;?>" class="btnEdit">Wijzig</a>
				<form action="/admin/restaurants/delete" method="post">
				<input type="hidden" name="restaurantid" value="<?php echo $row->restaurantid;?>" />
				<input type="submit" value="Verwijder" class="delete"/>
				</form>
				<img src="<?php echo '../upload/restaurants/' . $row->image; ?>" class="resfoto" alt="<?php echo $row->image; ?>">
				<p><?php echo $row->description; ?></p>
				<a href="<?php echo site_url('admin/restaurants/detail/'.$row->restaurantid.''); ?>">Meer info</a>

				<div>
					<a href="/admin/menu/view/<?php echo $row->restaurantid;?>" class="btn">Menu's beheren</a>
					<a href="/admin/tables/view/<?php echo $row->restaurantid;?>" class="btn">Tafels beheren</a>
					<a href="/admin/reservations/view/<?php echo $row->restaurantid;?>" class="btn">Reservaties bekijken</a>
				
				</div>

			</div>
		<?php } ?>
	<div class="clear"></div>
	</section>

<div>
	<a href="/admin/restaurants/form" class="btn">Restaurant toevoegen</a>
</div>
<script type="text/javascript">
	$('.delete').click(function(){
  	var answer = confirm('Weet u zeker dat u dit restaurant wilt verwijderen?');
  	return answer // answer is a boolean
	}); 
</script>


