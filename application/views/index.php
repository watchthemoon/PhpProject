<!doctype html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title><?php echo $title;?></title>
	<link href="/assets/css/style.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="/assets/js/main.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
	<link href="/assets/css/jquery-ui.css" type="text/css" rel="stylesheet">
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script>
		$(function() {
			$( document ).tooltip();
		});
	</script>

</head>
<body>

<header>
	<div id="center">
		<div id="logo">
			<p>Anjalaya</p>
		</div>
		<nav>
			<ul>
				<li><a href="/home">Home</a></li>

				<?php
				## Als het een ingelogde superuser is
				if ($online){

					if ($super){
						?>
						<li><a href="/admin/restaurants">Restaurants beheren</a></li>
					<?php
					}else{
						?>
						<li><a href="/uitleg">Uitleg</a></li>
						<li><a href="/restaurants">Restaurants</a></li>
						<li><a href="/contact">Contact</a></li>
					<?php
					}

					?>
					<li><a href="/logout">Uitloggen</a></li>
					<li><a href="/reservations">Reservaties</a></li>
				<?php

				}else{
					?>
					<li><a href="/uitleg">Uitleg</a></li>
					<li><a href="/restaurants">Restaurants</a></li>
					<li><a href="/contact">Contact</a></li>
					<li><a href="/register">Aanmelden</a></li>
					<li><a href="/login">Inloggen</a></li>
				<?php
				}
				?>
			</ul>
		</nav>
	</div>
</header>

	<div class="website">

		<?php if(!empty($melding)){ ?>
			<div class="notice"><?php echo $melding; ?></div>
		<?php } ?>
		<div class="main">
			<?php
			if ($view != ''){
				$this->load->view($view);
			}else{
				?><strong>Ey, geen view minoin!</strong><?php
			}
			?>
		</div>


	<div class="push"></div>
	</div>
	<footer>
		<p>Copyright 2014 - Anjalaya</p>
	</footer>

	<div id="popup_window">
		<div id="popup_form"></div>
	</div>

</body>
</html>