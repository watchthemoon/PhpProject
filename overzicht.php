<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Overzicht</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<nav>
		<?php if(isset($_SESSION['loggedin'])): ?>
			<a href="logout.php">Logout</a>
		<?php else: ?>
			<a href="index.php">Login</a>
		<?php endif; ?>
	</nav>
</body>
</html>