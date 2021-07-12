<?php

	use App\widgets\HeaderWidget;
	use App\widgets\NewHeaderWidget;
	use App\widgets\FooterWidget;

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="./css/custom.css">
	<script src="./js/custom.js" defer></script>

</head>


<body>

	<?php
		NewHeaderWidget::begin(['data' => []]);
	?>

		<?= $content ?>

	<?php
		FooterWidget::begin(['data' => []]);
	?>


</body>

</html>