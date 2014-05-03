<h1>Reservatie</h1>
<section id="home">

	<h2>Selecteer de tafel(s) waar u wilt reserveren.</h2>

	<section id="tafels">
		<?php
		for ($y = 1; $y <= 10; $y++) {
			for ($x = 1; $x <= 10; $x++) {
				if (is_object($tables[$x . '-' . $y])) {
					$table = $tables[$x . '-' . $y];
					?>
					<div id="block<?php echo $x . '-' . $y; ?>" class="grid-block-filled" data-tableid="<?php echo $table->tableid; ?>"></div><?php
				} else {
					?>
					<div id="block<?php echo $x . '-' . $y; ?>" class="grid-block"></div><?php
				}
			}
			?>
			<div class="clear"></div><?php
		}
		?>
	</section>
	</br>

	<form action="" method="post">
		<input id="buttonreserveer" type="submit" value="Reserveer"/>
	</form>
</section>

<script type="text/javascript">
	$("#buttonreserveer").on('click', function () {
		var data = {

		};
		openWindow('/reserve/form', data);
	});
</script>