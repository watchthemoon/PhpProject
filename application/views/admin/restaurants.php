<section class="contain">
		<h2>Restaurant Overzicht</h2>
			<table id="restauranttable">
				<tr>
				  <th>Naam</th>
				  <th>Wijzig</th>
				  <th>Verwijder</th>
				</tr>
				<?php foreach ($query as $row) { ?>
				<tr>
				<td class="naam" id="<?php echo $row->restaurantid;?>"><?php echo $row->name; ?></td>
				<td class="editkolom"><img src="../assets/images/edit.jpg" onclick="editrestaurant(<?php echo $row->restaurantid; ?>);" class="edit"/></td>
				<td class="deletekolom"><img src="../assets/images/delete.jpg" onclick="deleterestaurant(<?php echo $row->restaurantid; ?>);" class="delete"/></td>
				</tr>
				<?php } ?>
				</table>
				<!--<div>
					<a href="/admin/menu/view/<?php echo $row->restaurantid;?>" class="btn">Menu's beheren</a>
					<a href="/admin/tables/view/<?php echo $row->restaurantid;?>" class="btn">Tafels beheren</a>
					<a href="/admin/reservations/view/<?php echo $row->restaurantid;?>" class="btn">Reservaties bekijken</a>
				
				</div> -->
			
		
	<div class="clear"></div>
	<div class="knop">
	<a href="/admin/restaurants/form" class="btn">Restaurant toevoegen</a>
</div>
	</section>


<script type="text/javascript">
		function deleterestaurant(restaurantid){
			if(confirm('Weet u zeker dat u dit restaurant wilt verwijderen?')){
				document.location.href='/admin/restaurants/delete/' + restaurantid;
		  	}
		}; 
		function editrestaurant(restaurantid){
				document.location.href='/admin/restaurants/edit/' + restaurantid;
		}; 
		$('.naam').click(function(){
			var id = $(this).attr('id');
			document.location.href='/admin/restaurants/detail/' + id;
		});
</script>


