<!doctype html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title><?php echo $title;?></title>
	<link href="/assets/css/style.css" type="text/css" rel="stylesheet">

</head>
<body>

	<div class="website">

		<header>
			<nav>
				<ul>
					<li><a href="/home">Home</a></li>

					<?php
					## Als het een ingelogde superuser is
					if($super && $online){ ?>
						<li><a href="/admin/restaurants">Restaurants</a></li>
						<li><a href="/admin/menu">Menu's</a></li>
						<li><a href="/tafels">Tafels</a></li>
						<li><a href="/logout">Uitloggen</a></li>

					<?php
					## Als het een ingelogde gewone gebruiker is
					}else if($online){ ?>
						<li><a href="/uitleg">Uitleg</a></li>
						<li><a href="/restaurants">Restaurants</a></li>
						<li><a href="/contact">Contact</a></li>
						<li><a href="/logout">Uitloggen</a></li>

						<?php
					## Als het een niet ingelogd persoon is
					}else{ ?>
						<li><a href="/uitleg">Uitleg</a></li>
						<li><a href="/restaurants">Restaurants</a></li>
						<li><a href="/contact">Contact</a></li>
						<li><a href="/register">Aanmelden</a></li>
						<li><a href="/login">Inloggen</a></li>
					<?php }
					?>
				</ul>

				<?php /*
					if($super){ ?>
					<li><a href="/home">Home</a></li>
					<li><a href="/uitleg">Uitleg</a></li>
					<li><a href="/restaurants">Restaurants</a></li>
					<li><a href="/contact">Contact</a></li>
					<?php
					if($online){ ?>
						<li><a href="/logout">Uitloggen</a></li>
					<?php
					}else{
						?>
						<li><a href="/register">Aanmelden</a></li>
						<li><a href="/login">Inloggen</a></li>
					<?php
					}}else{ ?>
						<li><a>Geen restauranthouder</li>
					<?php } */
					?>
				</ul>
			</nav>
		</header>
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

	</footer>

</body>
</html>