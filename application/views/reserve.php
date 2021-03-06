<section class="tables contain">
	<h2>Reserveer in dit restaurant</h2>
	<div class="fleft">

		<div id="datepicker"></div>

		<br />

		<div id="time">
			<b>Tijdstip:</b><br />
			<select name="time" id="timeselector">
				<option value="12:00">12:00 - 14:00</option>
				<option value="14:00">14:00 - 16:00</option>
				<option value="16:00">16:00 - 18:00</option>
				<option value="18:00">18:00 - 20:00</option>
				<option value="20:00">20:00 - 22:00</option>
			</select>
		</div>

		<aside class="tables">
			<div>
				<div class="legend">
					<img src="/assets/images/table.png" alt="Vrije tafel" />
					<div class="free"></div>
				</div>
				<div class="text"><p> = vrije ruimte</p></div>
			</div>

			<div>
				<div class="legend">
					<img src="/assets/images/table.png" alt="Bezette tafel" />
					<div class="reserved"></div>
				</div>
				<div class="text"><p> = bezette ruimte</p></div>
			</div>
		</aside>

	</div>

	<div id="tables">
		<?php
		for ($y = 1; $y <= 10; $y++) {
			for ($x = 1; $x <= 10; $x++) {
				if (is_object($tables[$x . '-' . $y])) {
					$table = $tables[$x . '-' . $y];
					?>
					<div title="Deze tafel heeft <?php echo $table->amountseats ?> stoelen. Klik om te reserveren." id="block<?php echo $x . '-' . $y; ?>" class="grid-block-filled" data-aantalseats="<?php echo $table->amountseats ?>" data-tableid="<?php echo $table->tableid; ?>">
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
	</div>
	<div class="clear"></div>
</section>

<script type="text/javascript">
	var curdate = '<?php echo date("d-m-Y");?>';
	var curtime = '12:00';

	$(".grid-block-filled .free").on('click',function(){
		var data = {
			restaurantid: <?php echo $restaurantid ?>,
			tableid: $(this).parent().data('tableid'),
			vastaantal: $(this).parent().data('aantalseats'),
			resdate: curdate,
			restime: curtime
		};

  		openWindow('/reserve/form',data);
	});

	$('.grid-block').click(function(event){event.preventDefault()});

	liveCheck(<?php echo $restaurantid; ?>,curdate,curtime);
	setInterval(function(){
		liveCheck(<?php echo $restaurantid ?>,curdate,curtime);
	},5000)

	var dateToday = new Date();
	$("#datepicker").datepicker({
		firstDay: 1,
		dateFormat: "dd-mm-yy",
		minDate: dateToday,
		dayNames: [ "Zondag", "Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag" ],
		dayNamesMin: [ "Zo", "Ma", "Di", "Wo", "Do", "Vr", "Za" ],
		monthNames: [ "Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December" ],
		onSelect: function(date){
			curdate = date;
			liveCheck(<?php echo $restaurantid; ?>,curdate,curtime);
		}
	});

	$("#timeselector").on('change',function(){
		curtime = $(this).val();
		liveCheck(<?php echo $restaurantid; ?>,curdate,curtime);
	});
</script>