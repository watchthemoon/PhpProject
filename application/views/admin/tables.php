<section class="contain tables">
	<h2>Tafels</h2>
	<div id="grid">
		<?php
		for($y = 1; $y <= 10; $y++){
			for($x = 1; $x <= 10; $x++){
				if(is_object($tables[$x . '-' . $y])){
					$table = $tables[$x . '-' . $y];
					?><div id="block<?php echo $x . '-' . $y;?>" class="grid-block-filled" data-tableid="<?php echo $table->tableid;?>"></div><?php
				}else{
					?><div id="block<?php echo $x . '-' . $y;?>" class="grid-block"></div><?php
				}
			}
			?><div class="clear"></div><?php
		}
		?>
	</div>

</section>

<aside class="tables">
	<div>
		<div class="legend block"></div>
		<div class="text"><p>= lege ruimte</p></div>
	</div>

	<div>
		<div class="legend"><img src="/assets/images/table.png" alt="Tafel" /></div>
		<div class="text"><p>= bezette ruimte</p></div>
	</div>
</aside>

<script type="text/javascript">
	$(".grid-block").on('click',function(){
		var data = {
			'restaurantid': '<?php echo $restaurantid;?>',
			'coordinates': this.id.replace('block','')
		};
		openWindow('/admin/tables/form',data);
	});

	$(".grid-block-filled").on('click',function(){
		var data = {
			'restaurantid': '<?php echo $restaurantid;?>',
			'tableid': $(this).data('tableid'),
			'coordinates': this.id.replace('block','')
		};
		openWindow('/admin/tables/form',data);
	});
</script>