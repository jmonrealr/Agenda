<div class="col-12">
	<h3 class="text-secondary"><i class="icon-cog"></i> Configura tu cuenta</h3>
	<hr>
	<section class="pregunta-secreta">
		<h5 class="text-primary"><i class="icon-user"></i> Ingresa una pregunta secreta</h5>
		<hr>
		<hr>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?action=config">
			<label for="pregunta">Selecciona tu pregunta secreta</label>
			<select name="pregunta" class="form-control" id="pregunta">
				<option name="escuela">¿Donde estudiaste?</option>
				<option name="mascota">¿Como se llama tu mascota?</option>
				<option name="amigo">¿Como se llama tu mejor amigo?</option>
			</select>
			<br>
			<label for="respuesta">Respuesta</label>
			<input type="text" name="respuesta" id="respuesta" required placeholder="Escribe tu respuesta" class="form-control">
			<br>
			<input type="password" name="pass" placeholder="Tu contraseña" class="form-control">
			<br>
			<p class="small text-dark">Esta pregunta de secreta, te ayudara en caso que pierdas tu contraseña, no la olvides.</p>
			<button type="submit" class="btn btn-success" name="cambiarRespuesta">Agregar pregunta secreta</button>
		</form>
	</section>
</div>