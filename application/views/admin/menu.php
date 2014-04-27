<h1>Menu's</h1>
<div id="rightside">

	<section>

		<p>Hier komen de menu's voor de restauranthouder.</p>

		<button class="toevoegen" type="submit">menu toevoegen </button>

	</section>

<?php foreach ($query->result() as $row) { ?>
<div id="menu">
				<h2><?php echo $row->name; ?></h2>
				<p><?php echo $row->price; ?></p>
				
					


</div>

		<?php } ?>




<a href="#" class="menuvoorgerecht">Voorgerechten</a>
<a href="#" onclick="menuhoofdgerecht">Hoofdgerechten</a>
<a href="#" onclick="menunagerecht">Nagerechten</a>


<div id="menucontent"> 
</div>



<script type="text/javascript">
$(".toevoegen").on('click',function(){
		var data = {
			'restaurantid': '<?php echo $restaurantid;?>'
		};
		openWindow('/admin/menu/form',data);

	});
  $(".menuvoorgerecht").on('click',function(){
   		$('#menucontent').load('voorgerechten.php');
    });

    $(".menuhoofdgerecht").on('click',function(){
   		$('#menucontent').load('hoofdgerechten.php');
    }); 

     $(".menunagerecht").on('click',function(){
   		$('#menucontent').load('nagerechten.php');
    });
</script>
