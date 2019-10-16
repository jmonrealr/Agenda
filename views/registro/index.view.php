<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Agenda - Crea cuenta</title>
	<?php if (DEVELOPER == true): ?>
	
	<!-- Librerias externas -->
	<link rel="stylesheet" href="<?php echo RUTA; ?>views/asset/css/fontello.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>views/asset/css/bootstrap.min.css">
	<!-- Librerias internas -->
	<link rel="stylesheet" href="<?php echo RUTA; ?>views/asset/css/estilos.css">
	<?php endif; ?>
</head>
<body>
	
	<div class="container">
		<div class="row justify-content-center mt-4">
			<div class="col-5 form-login">
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?c=registro">
					<h2 class="text-center">Crear cuenta</h2>
					<input type="text" name="usuario" placeholder="Usuario" autocomplete="off">
					<input type="password" name="pass" placeholder="Contraseña">
					<input type="password" name="pass2" placeholder="Repita su contraseña">
					<label for="pregunta" class="small">¿Cuanto es 9099 + 1?</label>
					<input type="password" name="respuesta" id="pregunta" placeholder="Introduzca la repuesta, para continuar.">
					<?php if (!empty($errores)): ?>
						<div class="validate error"><?php echo $errores; ?></div>
					<?php endif; ?>
					<div class="text-dark small">¿Tienes cuenta? <a href="index.php">Inicia sesion</a></div>
					<hr>
					<button type="submit">Crear cuenta</button>
				</form>
			</div>
		</div>
	</div>

</body>
</html>