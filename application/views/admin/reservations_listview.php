<script type="text/javascript">
 $(document).ready(function(){
    	var data = {
		'restaurantid' : '<?php echo $restaurantid;?>',
		'weergave' : 'lijstres',
		'date' : '<?php echo date("d-m-Y");?>'
	}
	$(".reservation").load('/admin/reservations/loadres',data);
});

</script>

		

<section class="contain">	
	<div class="fleft">
		<div id="datepicker" class="dp contain"></div>
		
	</div>

<div id="reservaties">
<div class="reservation contain">



</div>
</div>

	

<script type="text/javascript">



	$("#datepicker").datepicker({
		firstDay: 1,
		dateFormat: "dd-mm-yy",
		dayNames: [ "Zondag", "Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag" ],
		dayNamesMin: [ "Zo", "Ma", "Di", "Wo", "Do", "Vr", "Za" ],
		monthNames: [ "Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December" ],
		onSelect: function(date){
			var data = {
		'restaurantid' : '<?php echo $restaurantid;?>',
		'weergave' : 'lijstres',
		'date' : date
	}
	$(".reservation").load('/admin/reservations/loadres',data);
}
	});
</script>

</section>
