<section class="contain">
<h1>Voltooide reservatie.</h1>
		<h2>Een overzicht van jou reservatie.</h2>
		<p>Tafelnummer: <?php echo $tafelnummer; ?></p>
		<p>Aantal personen: <?php echo $aantalpersonen; ?></p>
		<p>Datum: <?php echo date("d-m-Y",strtotime($date)); ?></p>
		<p>Tijd: <?php echo date("H:i",strtotime($time)); ?></p>

		
		<a href="/">Ga terug naar de startpagina.</a>
		<p></p>
<h2>Nog vragen? Neem dan contact met ons op!</h2>
		<a href="/contact">Ga naar de contactpagina.</a>
</section>
<?php
	$this->session->unset_userdata('aantal2');
	$this->session->unset_userdata('aantal1');
?>

