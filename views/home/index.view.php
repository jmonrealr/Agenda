<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Agenda - Bienvenido a tu agenda</title>
	<?php if (DEVELOPER == true): ?>
	
	<!-- Librerias externas -->
	<link rel="stylesheet" href="<?php echo RUTA; ?>views/asset/css/fontello.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>views/asset/css/bootstrap.min.css">
	<!-- Librerias internas -->
	<link rel="stylesheet" href="<?php echo RUTA; ?>views/asset/css/estilos.css">
	<?php endif; ?>
</head>
<body>
	
	<div class="container-fluid">
		<div class="row">
			<div class="hidden-md-down col-lg-3 menu-left">
				<div class="logo">
					<h2>Tu agenda</h2>
				</div>
				<div class="lista-opciones d-flex flex-column">
					<a href="index.php"><i class="icon-home"></i><span>Inicio</span></a>
					<a href="?action=nuevoContacto"><i class="icon-user-plus"></i><span>Nuevo contacto</span></a>
					<a href="?action=administrar"><i class="icon-pencil"></i><span>Administrar contactos</span></a>
					<a href="?action=search"><i class="icon-search"></i><span>Buscar contactos</span></a>
					<a href="?action=config"><i class="icon-cog"></i><span>Configurar cuenta</span></a>
					<a href="salir.php"><i class="icon-cancel"></i><span>Salir</span></a>
				</div>
			</div>

			<div class="columna col-md-12 col-lg-9">
				<div class="row">
					<?php if (!isset($_GET['action'])): ?>
						<div class="col-lg-12">
							<span class="text-secondary">Bienvenido <?php echo $_SESSION['usuario']; ?></span>
							<br>
							<br>
							<?php if ($contactoCliente->listaContacto($_SESSION['usuario']) >= 1): ?>
								<div class="tiene-contacto">
									<h2 class="text-success">Ya has agregado contactos</h2>
									<br>
									<a href="?action=nuevoContacto" class="btn btn-secondary"><i class="icon-user-plus"></i> Crea un nuevo contacto</a>
									<a href="?action=administrar" class="btn btn-danger"><i class="icon-pencil"></i>Administra tus contactos</a>
								</div>
							<?php elseif($contactoCliente->listaContacto($_SESSION['usuario']) == 0): ?>
								<div class="no-tiene-contacto">
									<h2 class="text-danger"><i class="icon-cancel"></i> No tienes contactos</h2>
									<hr>
									<a href="?action=nuevoContacto" class="btn btn-primary"><i class="icon-user-plus"></i> Nuevo contacto</a>

									<a href="?action=config" class="btn btn-dark"><i class="icon-cog"></i> Configura tu cuenta</a>
								</div>
							<?php endif; ?>
						</div>
					<?php else: ?>
						<?php 

							switch ($_GET['action']) {
								case 'nuevoContacto':
									require 'views/home/nuevoContacto.view.php';
									break;
								case 'administrar':
									require 'views/home/administrarContacto.view.php';
									break;
								case 'search':
									require 'views/home/search.view.php';
									break;
								case 'config':
									require 'views/home/configurar.view.php';
									break;
								// Otros casos
								case 'eliminar':
									require 'views/home/eliminar.php';
									break;
								default:
									header('Location: index.php');
									break;
							}
						?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>


<script type="text/javascript">
	function deletePost(){
		return window.confirm('¿Desea eliminar el contacto?');
	}
</script>
</body>
</html>