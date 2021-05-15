<?php

	use App\widgets\HeaderWidget;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Disfruta tu comida!</title>

	<link rel="stylesheet" href="/css/bootstrap.css">
	<link rel="stylesheet" href="/css/main.css">
	<script src="/js/jquery.js"></script>
	<script src="/js/bootstrap.bundle.js"></script>

</head>

<header>
	<?php
		HeaderWidget::begin(['data' => []]);
	?>
</header>

<body>
    <div class="container">
        <?= $content ?>
    </div>
</body>

<footer>
</footer>

</html>