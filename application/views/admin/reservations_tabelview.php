<section class="contain">	
	<div class="fleft">
		<div id="datepicker"></div>
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
					<div title="Deze tafel heeft <?php echo $table->amountseats ?> stoelen. Klik om te reserveren." id="block<?php echo $x . '-' . $y; ?>" class="grid-block-filled" data-tableid="<?php echo $table->tableid ?>">
						<div class="reservedBackEnd" id="tableid<?php echo $table->tableid ?>"></div>
						<div class="free" id="tableid<?php echo $table->tableid ?>"></div>
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
var resdate = '<?php echo date("d-m-Y");?>';
	$(".grid-block-filled .free").on('click',function(){
		var data = {
			'restaurantid': '<?php echo $restaurantid;?>',
			'tableid' : this.id.replace('tableid',''),
			'resdate' : resdate,
			'gereserveerd' : 'vrij'
		};
		openWindow('/admin/reservations/form',data);
	});

	$(".grid-block-filled .reservedBackEnd").on('click',function(){
		var data = {
			'restaurantid': '<?php echo $restaurantid;?>',
			'tableid' : this.id.replace('tableid',''),
			'resdate' : resdate,
			'gereserveerd' : 'bezet'
		};
		openWindow('/admin/reservations/form',data);
	});

	$('.grid-block').click(function(event){event.preventDefault()});

	liveCheckBackEnd(<?php echo $restaurantid; ?>,curdate);
	setInterval(function(){
		liveCheckBackEnd(<?php echo $restaurantid ?>,curdate);
	},5000)

	$("#datepicker").datepicker({
		firstDay: 1,
		dateFormat: "dd-mm-yy",
		dayNames: [ "Zondag", "Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag" ],
		dayNamesMin: [ "Zo", "Ma", "Di", "Wo", "Do", "Vr", "Za" ],
		monthNames: [ "Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December" ],
		onSelect: function(date){
			resdate = date;
			curdate = date;
			liveCheckBackEnd(<?php echo $restaurantid; ?>,curdate);
		}
	});
</script>

</section>