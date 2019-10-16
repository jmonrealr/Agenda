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
			<div class="col-3 menu-left">
				<div class="logo">
					<h2>Tu agenda</h2>
				</div>
				<div class="lista-opciones d-flex flex-column">
					<a href="index.php"><i class="icon-home"></i><span>Inicio</span></a>
					<a href="index.php?action=nuevoContacto"><i class="icon-user-plus"></i><span>Nuevo contacto</span></a>
					<a href="index.php?action=administrar"><i class="icon-pencil"></i><span>Administrar contactos</span></a>
					<a href="index.php?action=search"><i class="icon-search"></i><span>Buscar contactos</span></a>
					<a href="index.php?action=config"><i class="icon-cog"></i><span>Configurar cuenta</span></a>
					<a href="salir.php"><i class="icon-cancel"></i><span>Salir</span></a>
				</div>
			</div>

			<div class="columna col">
				<div class="row">
					<div class="col-12">
						<h2 class="text-secondary"><i class="icon-search"></i> Busqueda</h2>
						<form method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?action=search">
							<input type="text" name="s" placeholder="Busca tus contactos: Ej. Ana" class="form-control" value="<?php echo $_GET['s']; ?>">
							<br>
							<button class="btn btn-primary"><i class="icon-search"></i> Buscar</button>
						</form>
						<hr>
						<?php if ($resultadoBusqueda): ?>
							
						<h2 class="text-success"><i class="icon-ok"></i> Resultado de tu busqueda: <?php echo $_GET['s']; ?></h2>
						<hr>
						<table class="table table-light table-bordered table-hover">
							<thead class="bg-light">
								<td><strong>ID</strong></td>
								<td><strong>Nombre</strong></td>
								<td><strong>Apellido</strong></td>
								<td><strong>Telefono</strong></td>
								<td><strong>Email</strong></td>
								<td><strong>Acciones</strong></td>
							</thead>
							<?php foreach ($resultadoBusqueda as $mostrarContacto): ?>
							<tbody>
								<td><?php echo $mostrarContacto['id']; ?></td>
								<td><?php echo $mostrarContacto['nombre']; ?></td>
								<td><?php echo $mostrarContacto['apellido']; ?></td>
								<td><?php echo $mostrarContacto['phone']; ?></td>
								<td><?php echo $mostrarContacto['email']; ?></td>
								<td>
									<a href="?action=administrar&admin=ver&id=<?php echo $mostrarContacto['id']; ?>" class="btn btn-success">Ver</a>
									<a href="?action=administrar&admin=modificar&id=<?php echo $mostrarContacto['id']; ?>" class="btn btn-primary">Modificar</a>
									<a href="?action=administrar&admin=eliminar&id=<?php echo $mostrarContacto['id']; ?>" class="btn btn-danger"><i class="icon-cancel"></i> Eliminar</a>
								</td>
							</tbody>
							<?php endforeach ?>
						</table>
						<?php else: ?>
							<h2 class="text-danger"><i class="icon-search"></i> No hay resultado de tu busqueda <a href="index.php?action=NuevoContacto"></a></h2>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>