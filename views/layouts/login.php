<?php

	use App\widgets\LoginHeaderWidget;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>

	<link rel="stylesheet" href="/css/bootstrap.css">
	<link rel="stylesheet" href="/css/main.css">
	<script src="/js/jquery.js"></script>
	<script src="/js/bootstrap.bundle.js"></script>

</head>
<body>

	<header>
		<?php
			LoginHeaderWidget::begin(['data' => []]);
		?>
	</header>

	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-5">
				<?= $content ?>
			</div>
		</div>
	</div>



</body>
</html>