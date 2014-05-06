<h1>Reservatie</h1>
<div class="fleft">
	<div id="datepicker"></div>
</div>
<div class="fleft">
	<section class="tables">

		<h2>Selecteer de tafel(s) waar u wilt reserveren.</h2>

		<section id="tables">
			<?php
			for ($y = 1; $y <= 10; $y++) {
				for ($x = 1; $x <= 10; $x++) {
					if (is_object($tables[$x . '-' . $y])) {
						$table = $tables[$x . '-' . $y];
						?>
						<div title="Deze tafel heeft <?php echo $table->amountseats ?> stoelen. Klik om te reserveren." id="block<?php echo $x . '-' . $y; ?>" class="grid-block-filled" data-tableid="<?php echo $table->tableid; ?>">
							<div class="free"></div>
						</div>
					<?php
					} else {
						?>
						<div id="block<?php echo $x . '-' . $y; ?>" class="grid-block-none" ></div><?php
					}
				}
				?>
				<div class="clear"></div><?php
			}
			?>
			
		</section>
		</br>
	</section>

	<aside class="tables">
		<div>
			<div class="legend">
				<img src="/assets/images/table.png" alt="Vrije tafel" />
				<div class="free"></div>
			</div>
			<div class="text"><p>= vrije ruimte</p></div>
		</div>

		<div>
			<div class="legend">
				<img src="/assets/images/table.png" alt="Bezette tafel" />
				<div class="reserved"></div>
			</div>
			<div class="text"><p>= bezette ruimte</p></div>
		</div>
	</aside>

</div>
<div class="clear"></div>

<script type="text/javascript">
	var curdate = '<?php echo date("d-m-Y");?>';
	$(".grid-block-filled .free").on('click',function(){

		openWindow('/reserve/form',{});
	});

	$('.grid-block').click(function(event){event.preventDefault()});

	liveCheck(<?php echo $restaurantid; ?>,curdate);
	setInterval(function(){
		liveCheck(<?php echo $restaurantid ?>,curdate);
	},5000)

	$("#datepicker").datepicker({
		firstDay: 1,
		dateFormat: "dd-mm-yy",
		dayNames: [ "Zondag", "Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag" ],
		dayNamesMin: [ "Zo", "Ma", "Di", "Wo", "Do", "Vr", "Za" ],
		monthNames: [ "Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December" ],
		onSelect: function(date){
			curdate = date;
			liveCheck(<?php echo $restaurantid; ?>,curdate);
		}
	});
</script>