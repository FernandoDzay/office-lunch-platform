<?php

	use App\widgets\LoginHeaderWidget;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Login</title>

	<meta name="robots" content="noindex, nofollow"/>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/login_custom.css">


	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>

</head>
<body class="cover" style="background-image: url(./assets/img/loginFont.jpg);">

	<header>
		<?php
			LoginHeaderWidget::begin(['data' => []]);
		?>
	</header>


	<?= $content ?>


	
	<!--====== Scripts -->

	<script src="./js/jquery.validate.min.js"></script>
	<script src="./js/messages_es.js"></script>
	<script src="./js/login_custom.js"></script>
	<script>
		$.material.init();
	</script>

</body>
</html>