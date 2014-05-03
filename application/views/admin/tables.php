<h1>Tafels</h1>
<div id="rightside">

	<section>

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

</div>

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
			'tableid': $(this).data('tableid')
		};
		openWindow('/admin/tables/form',data);
	});
</script>