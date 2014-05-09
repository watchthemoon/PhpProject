<section class="contain">
<h1>Welkom bij Anjalaya</h1>
		<h2>Jou reservaties</h2>

		<div id="klantenreservaties" class="reservatieklant">
		</div>
</section>

<script type="text/javascript">
 $(document).ready(function(){
    	var data = {
		'restaurantid' : '<?php echo $restaurantid;?>',
		'weergave' : 'lijstres'
	}
	$(".reservatieklant").load('/reservations/loadrescustomer',data);
});
