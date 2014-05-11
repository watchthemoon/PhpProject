<script type="text/javascript">
 $(document).ready(function(){
	$(".reservatieklant").load('/reservations/loadrescustomer',data);
});

 </script>

<section class="contain">
<h1>Welkom bij Anjalaya</h1>
		<h2>Jou reservaties</h2>
		<div id="klantenreservaties" class="reservatieklant">
		<?php foreach ($rquery as $row) { ?>
			<?php echo "Restaurant: " .$row->restaurantid ?>
			<?php echo "Tafelnummer: " .$row->tableid ?>
			<?php echo "Aantal personen: " .$row->peoplenr?>
			<?php echo "Datum: " .$row->date?>
		<?php } ?>
		</div>
</section>




