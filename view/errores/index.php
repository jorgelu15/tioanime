<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tioanime</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php require_once "view/scripts.php"; ?>
</head>
<body class="dark">
	<div id="tioanime">
		<?php require_once "view/navbar.php"; ?>
		<div class="container">
			<h1><?php echo $this->mensaje; ?></h1>
		</div>
		<?php require_once "view/footer.php"; ?>
	</div>
	<?php require_once "view/script-body.php"; ?>
</body>
</html>