<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Directorio de Animes</title>
	<?php require "view/scripts.php"; ?>
</head>

<body class="dark">
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0"></script>
	<div id="tioanime">
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="#"><img src="../img/logo-dark.png"></a>
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
						<h1>Subir un Capitulo</h1>
						<form id="formAddCap" method="POST" action="<?php echo htmlentities(constant('URL') . 'agregarCapitulo/subir'); ?>">
							<div class="form-group">
								<input type="text" name="nombreCap" id="nombreCap" placeholder="Nombre del Capitulo" class="input-form" autocomplete="off" />
							</div>
							<div class="form-group">
								<input type="text" name="miniatura" id="miniatura" placeholder="Imagen miniatura" class="input-form"  autocomplete="off" />
							</div>
							<div class="form-group">
								<input type="text" name="opcion-1" id="url" placeholder="URL del capitulo" class="input-form"  autocomplete="off" />
							</div>
							<div class="form-group">
								<input type="text" name="opcion-2" id="url" placeholder="URL del capitulo" class="input-form"  autocomplete="off" />
							</div>
							<div class="form-group">
								<select id="anime" name="animeid" class="input-form">
									<option>Por defecto</option>
									<?php foreach($this->series as $row) { ?>
										<option value="<?php echo $row->id; ?>"><?php echo $row->titulo; ?></option>
									<?php } ?>
								</select>
							</div>

							<input type="submit" name="enviar" id="addCap" class="btn btn-success btn-block" value="Subir Capitulo">
						</form>
						<br>
						<div id="errores"></div>
					</div>
				</div>
				<?php require "view/lista-panel.php"; ?>
			</div>
		</div>
		<footer class=" footer">
			<div class="container">
				<img src="../img/logo-ft.png">
			</div>
		</footer>
	</div>
	<script src="<?php echo constant('URL'); ?>public/js/addChapter.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>