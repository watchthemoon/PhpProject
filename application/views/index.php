<!doctype html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title><?php echo $title;?></title>
	<link href="/assets/css/style.css" type="text/css" rel="stylesheet">

</head>
<body>

	<?php
	if ($view != ''){
		$this->load->view($view);
	}else{
		?><strong>Ey, geen view minoin!</strong><?php
	}
	?>

</body>
</html>