<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Tioanime</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php require_once "view/scripts.php"; ?>
</head>

<body>
	<?php require_once "view/navbar.php"; ?>
	<br><br>
	<div id="bg">
		<div class="container">
			<div class="directorio">
				<h1>Animes Recientes</h1>
				<br>
				<div class="recents">
					<aside class="filtro">
						<form class="form-filtro" action="<?php echo constant('URL'); ?>directorio/filtrar" method="GET" autocomplete="off">
							<label for="">TIPO</label>
							<select class="select-form" name="tipo" id="">
								<option value="DEFAULT">SELECCIONAR</option>
								<option value="SERIE">SERIE</option>
								<option value="OVA">OVA</option>
								<option value="PELICULA">PELICULA</option>
								<option value="ESPECIAL">ESPECIAL</option>
							</select>
							<br>
							<label for="">GENERO</label>
							<select class="select-form" name="genre" id="">
								<option value="DEFAULT">SELECCIONAR</option>
								<?php
									foreach ($this->generos as $row) {
										$item = new Generos();
										$item = $row;
								?>
								<option value="<?php echo $item->genero; ?>"><?php echo $item->genero; ?></option>
								<?php } ?>
							</select>
							<br>
							<label for="">AÑO</label>
							<select class="select-form" name="anio" id="">
								<option value="DEFAULT">SELECCIONAR</option>
								<option value="">ANIME</option>
								<option value="">SERIE</option>
							</select>
							<br>
							<label for="">ESTADO</label>
							<select class="select-form" name="estado" id="">
								<option value="DEFAULT">SELECCIONAR</option>
								<option value="">ANIME</option>
								<option value="">SERIE</option>
							</select>
							<br>
							<input class="btn" type="submit" value="FILTRAR" />
						</form>
					</aside>
					<section class="articles">
					<?php
					foreach ($this->animesFiltrados as $row) {
						$item = new Anime();
						$item = $row;
					?>
						<article class="card">
							<div class="thumb">
								<a href=""><img src="<?php echo $item->portada; ?>"></a>
							</div>
							<div class="txtTitle">
								<?php echo $item->titulo; ?>
							</div>
						</article>
						<?php } ?>
					</section>
				</div>
			</div>
		</div>
		<?php require_once "view/footer.php"; ?>
	</div>
	<?php require_once "view/script-body.php"; ?>
</body>

</html>