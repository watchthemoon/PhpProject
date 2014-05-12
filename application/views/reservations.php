<section class="contain">
		<h2>Jouw reservaties</h2>
		<div>
			<table id="table">
				<tr>
					<th>Datum</th>
					<th>Restaurant naam</th>
					<th>Tafelnummer</th>
					<th>Aantal personen</th>
				</tr>
				<?php foreach($reservations as $reservation){ ?>
				<tr>
					<td><?php echo date('d-m-Y', strtotime($reservation->date)); ?></td>
					<td><?php echo $reservation->restaurantname; ?></td>
					<td><?php echo $reservation->tablename; ?></td>
					<td><?php echo $reservation->peoplenr; ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
</section>




