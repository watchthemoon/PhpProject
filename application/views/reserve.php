<h1>Reservatie</h1>
<section class="tables">

	<h2>Selecteer de tafel(s) waar u wilt reserveren.</h2>

	<section id="tables">
		<?php
		for ($y = 1; $y <= 10; $y++) {
			for ($x = 1; $x <= 10; $x++) {
				if (is_object($tables[$x . '-' . $y])) {
					$table = $tables[$x . '-' . $y];
					?>
					<div id="block<?php echo $x . '-' . $y; ?>" class="grid-block-filled" data-tableid="<?php echo $table->tableid; ?>"></div><?php
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
		<div class="legend"><img src="/assets/images/table.png" alt="Vrije tafel" /></div>
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

<script type="text/javascript">

	$(".grid-block-filled").on('click',function(){
		if ($(this).find('.reserved').length == 0){
			location.href = "/reserve/reservetable";
		}
	});

<<<<<<< HEAD
	$('.grid-block').click(function(event){event.preventDefault()});
=======
	liveCheck(<?php echo $restaurantid; ?>);

	setInterval(function(){
		liveCheck(<?php echo $restaurantid ?>);
	},2000)
>>>>>>> 7e5a9cb1372ad71c6d20fcefb1deb7cb84f9bcfa

</script>