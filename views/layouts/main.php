<?php

	use App\widgets\HeaderWidget;
	use App\widgets\FooterWidget;
	use App\core\Config;

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="robots" content="noindex, nofollow"/>
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="./css/custom.css">

	<script>
		user_id = <?= $_SESSION['user_id'] ?>;
		base_url = "<?= Config::getBaseUrl() ?>";
	</script>

</head>


<body>

	<?php
		HeaderWidget::begin(['data' => []]);
	?>

		<?= $content ?>

	<?php
		FooterWidget::begin(['data' => []]);
	?>


</body>

</html>