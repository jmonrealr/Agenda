<?php if ($contactoCliente->mostrarContactos($_SESSION['usuario'])): ?>
	<div class="col-12">
	<h3 class="text-secondary"><i class="icon-pencil"></i> Administrar contactos</h3>
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
		<?php foreach ($contactoCliente->mostrarContactos($_SESSION['usuario']) as $mostrarContacto): ?>
		<tbody>
			<td><?php echo $mostrarContacto['id']; ?></td>
			<td><?php echo $mostrarContacto['nombre']; ?></td>
			<td><?php echo $mostrarContacto['apellido']; ?></td>
			<td><?php echo $mostrarContacto['phone']; ?></td>
			<td><?php echo $mostrarContacto['email']; ?></td>
			<td>
				<div class="d-flex flex-wrap justify-content-end align-items-center">
				<a href="?action=ver=<?php echo $mostrarContacto['id']; ?>" class="btn btn-success mr-1">Ver</a>
				<a href="?action=modificar=<?php echo $mostrarContacto['id']; ?>" class="btn btn-primary mr-1">Modificar</a>
				<a onclick="return deletePost();" href="?action=eliminar&id=<?php echo $mostrarContacto['id']; ?>" class="btn btn-danger"><i class="icon-cancel"></i> Eliminar</a>
			
				</div>
			</td>
		</tbody>
		<?php endforeach ?>
	</table>
</div>
<?php else: ?>
	<div class="col-12">
		<h3 class="text-danger"><i class="icon-cancel"></i> No tienes contactos agregados :(</h3>
		<hr>
		<a href="?action=nuevoContacto" class="btn btn-success">Agrega un contacto nuevo</a>
	</div>
<?php endif; ?>