<section class="contain">
	<div class="fleft">
		<div id="datepicker"></div>

		<br/>

		<div id="time">
			<b>Tijdstip:</b><br/>
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
					<img src="/assets/images/table.png" alt="Vrije tafel"/>

					<div class="free"></div>
				</div>
				<div class="text"><p>= vrije ruimte</p></div>
			</div>

			<div>
				<div class="legend">
					<img src="/assets/images/table.png" Aprilt="Bezette tafel"/>

					<div class="reservedBackEnd"></div>
				</div>
				<div class="text"><p>= bezette ruimte</p></div>
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
					<div title="Deze tafel heeft <?php echo $table->amountseats ?> stoelen. Klik om te reserveren."
					     id="block<?php echo $x . '-' . $y; ?>" class="grid-block-filled"
					     data-aantalseats="<?php echo $table->amountseats ?>"
					     data-tableid="<?php echo $table->tableid ?>">
						<div class="reservedBackEnd" id="tableid<?php echo $table->tableid ?>"></div>
						<div class="free" id="tableid<?php echo $table->tableid ?>"></div>
					</div>
				<?php
				} else {
					?>
				<div id="block<?php echo $x . '-' . $y; ?>" class="grid-block-none"></div><?php
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

	$(".grid-block-filled .free").on('click', function () {
		var data = {
			'restaurantid': '<?php echo $restaurantid;?>',
			'tableid': this.id.replace('tableid', ''),
			vastaantal: $(this).parent().data('aantalseats'),
			'resdate': curdate,
			'restime': curtime,
			'gereserveerd': 'vrij'
		};
		openWindow('/admin/reservations/form', data);
	});

	$(".grid-block-filled .reservedBackEnd").on('click', function () {
		var data = {
			'restaurantid': '<?php echo $restaurantid;?>',
			'tableid': this.id.replace('tableid', ''),
			'resdate': curdate,
			'restime': curtime,
			'gereserveerd': 'bezet'
		};
		openWindow('/admin/reservations/form', data);
	});

	$('.grid-block').click(function (event) {
		event.preventDefault()
	});

	liveCheckBackEnd(<?php echo $restaurantid; ?>, curdate, curtime);
	setInterval(function () {
		liveCheckBackEnd(<?php echo $restaurantid ?>, curdate, curtime);
	}, 5000)

	var dateToday = new Date();
	$("#datepicker").datepicker({
		firstDay: 1,
		dateFormat: "dd-mm-yy",
		minDate: dateToday,
		dayNames: [ "Zondag", "Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag" ],
		dayNamesMin: [ "Zo", "Ma", "Di", "Wo", "Do", "Vr", "Za" ],
		monthNames: [ "Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December" ],
		onSelect: function (date) {
			curdate = date;
			liveCheckBackEnd(<?php echo $restaurantid; ?>, curdate, curtime);
		}
	});

	$("#timeselector").on('change', function () {
		curtime = $(this).val();
		liveCheckBackEnd(<?php echo $restaurantid; ?>, curdate, curtime);
	});
</script>

</section>
