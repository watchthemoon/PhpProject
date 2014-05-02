<h1>Tafels</h1>
<div id="rightside">

	<section>

		<div id="grid">
			<?php
				for($y = 1; $y <= 10; $y++){
					for($x = 1; $x <= 10; $x++){
						$teller = 0;
						if(!empty($tables)){

							foreach($tables as $table){
								$str = $x . '-' . $y;
								if($str == $table->coordinates){
									$teller++;
									?><div id="block<?php echo $x . '-' . $y;?>" class="grid-block-filled"></div><?php
								}

							}
						}
						if($teller == 0){
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
			'coordinates': '<?php echo $table->coordinates;?>',
			'tablename': '<?php echo $table->name;?>',
			'amount': '<?php echo $table->amountseats;?>'
		};
		openWindow('/admin/tables/edit',data);
	});
</script>