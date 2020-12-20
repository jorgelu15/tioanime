<!DOCTYPE html>
<html lang="en">

<head>
	<title>Directorio de Animes</title>
	<?php require_once "view/scripts.php"; ?>
</head>

<body class="dark">
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0"></script>
	<div id="tioanime">
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="#"><img src="<?php echo constant('URL'); ?>public/img/logo-dark.png"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li>
					</ul>
					<div>
						<form action="" method="post">
							<label>
								<input type="search" name="q" class="form-control col-12" placeholder="Buscar...">
							</label>
						</form>
					</div>
				</div>

			</nav>
		</header>

		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-admin">
						<h1>Subir un Anime</h1>
						<form id="formAddAnime" method="POST" action="<?php echo htmlentities(constant('URL') . 'agregarAnime/subir'); ?>">
							<div class="form-group">
								<input type="text" id="nombre" name="nombreAnime" placeholder="Nombre del Anime" class="input-form" />
							</div>
							<div class="form-group">
								<input type="text" id="img" name="img" placeholder="Subir una Imagen" class="input-form" />
							</div>
							<div class="form-group">
								<input type="text" id="miniatura" name="miniatura" placeholder="Miniatura del Anime" class="input-form" />
							</div>
							<div class="form-group">
								<textarea id="sinopsis" name="sinopsis" class="input-form" placeholder="Ingresa una sinopsis"></textarea>
							</div>
							<hr>
							<h5>Añadir Categorias</h5>
							<div class="form-group">
								<div class="categorias-seleccionadas">
									<div id="seleccion-categoria"></div>
									<select id="categoria" name="categorias[]" multiple data-multi-select-plugin>
										<?php 
											foreach ($this->categorias as $row) {
												$genero = new Categorias();
												$genero = $row; 
										?>
										<option value="<?php echo $genero->categoria; ?>"><?php echo $genero->categoria; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<input type="submit" id="addanime" name="enviar" class="btn btn-success btn-block" value="Subir Anime">
						</form>
						<br>
						<div id="errores"></div>
					</div>
				</div>
				<?php require "view/lista-panel.php"; ?>
			</div>
		</div>
		<?php require "view/footer.php"; ?>
	</div>
	<script src="<?php echo constant('URL'); ?>public/js/addanime.js"></script>
	<script src="<?php echo constant('URL'); ?>public/js/multiselect.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>