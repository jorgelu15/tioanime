<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Directorio de Animes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php require_once "view/scripts.php"; ?>
	<link rel="stylesheet" href="<?php constant('URL'); ?>public/css/tioanime.css">

</head>

<body>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="6E3uBSji"></script>
	<?php require_once "view/navbar.php"; ?>
	<div class="bg">
		<section class="game-info">
			<div class="overview">
				<div class="container">
					<div class="row">
						<div class="thumb-anime hidden-xs">
							<figure>
								<img src="<?php echo constant('URL'); ?>public/img/anime.jpg" />
							</figure>
						</div>
						<div class="description">
							<h1 class="title-game">Naruto Shippuden</h1>
							<div>
								<span class="txtDesc">Lorem ipsum dolor,
									sit amet consectetur adipisicing elit. Perferendis, doloremque. Quibusdam illum hic aperiam eaque?</span>
							</div>
						</div>
					</div>
				</div>
				<figure class="backdrop">
					<img src="<?php echo constant('URL'); ?>public/img/cover1.jpg" />
				</figure>
			</div>
		</section>
		<div class="container">
			<div class="row">
				<section class="game-info">
					<div class="summary">
						<div class="title-desc divider">
							<div class="titles">
								Lista de Capitulos
							</div>
						</div>
						<div class="txtDesc zonacrack-pt column-caps">
							<a class="item-cap" href="">Naruto Shippuden Capitulo 3</a>
							<a class="item-cap" href="">Naruto Shippuden Capitulo 2</a>
							<a class="item-cap" href="">Naruto Shippuden Capitulo 1</a>
						</div>
					</div>
				</section>
				<aside class="game-info">
					<div class="summary">
						<div class="title-desc divider">
							<div class="titles">
								Lista de Capitulos
							</div>
						</div>
						<div class="txtDesc zonacrack-pt">
						<div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
						</div>
					</div>
				</aside>
			</div>
		</div>
		<br>
	</div>
	<?php require_once "view/footer.php"; ?>
	<?php require_once "view/script-body.php"; ?>
</body>

</html>