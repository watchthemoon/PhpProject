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
					<li><a href="/uitleg">Uitleg</a></li>
					<li><a href="/restaurants">Restaurants</a></li>
					<li><a href="/register">Aanmelden</a></li>
					<li><a href="/login">Inloggen</a></li>
					<li><a href="/contact">Contact</a></li>
				</ul>
			</nav>
		</header>

		<div class="main">
			<?php
			if ($view != ''){
				$this->load->view($view);
			}else{
				?><strong>Ey, geen view minoin!</strong><?php
			}
			?>
		</div>


	</div>

</body>
</html>