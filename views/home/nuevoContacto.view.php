<div class="col-lg-12">
	<div class="fnuevo-contacto">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?action=nuevoContacto">
			<h3 class="text-secondary"><i class="icon-user-plus"></i>Nuevo contacto</h3>
			<br>
			<input type="hidden" name="usuario" value="<?php echo $_SESSION['usuario']; ?>">
			<label for="phone">Teléfono</label>
			<input type="number" name="phone" required class="form-control" placeholder="Ej: +58 4245178897">
			<hr>
			<div class="form-group">
				<div class="row">
					<div class="col-lg-6">
						<input type="text" name="nombre" autocomplete="off" class="form-control" required placeholder="Nombre">
					</div>
					<div class="col-lg-6">
						<input type="text" name="apellido" autocomplete="off" class="form-control" required placeholder="Apellido">
					</div>
				</div>
			</div>
			<input type="email" name="email" autocomplete="off" class="form-control" placeholder="Correo electronico (Opcional)">
			<br>
			<?php if (!empty($errores)): ?>
				<div class="validate error"><?php echo $errores; ?></div>
			<?php endif; ?>
			<button type="submit" class="btn btn-success" name="enviarContacto"><i class="icon-ok"></i> Crear contacto</button>
			<a href="index.php" class="btn btn-danger"><i class="icon-cancel"></i> Cancelar</a>
		</form>
	</div>
</div>