<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Agenda - Inicia sesión</title>
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
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
					<h2 class="text-center">Acceso al sistema</h2>
					<input type="text" name="usuario" placeholder="Usuario" autocomplete="off">
					<input type="password" name="pass" placeholder="Contraseña">
					<?php if (!empty($errores)): ?>
						<div class="validate error"><?php echo $errores; ?></div>
					<?php endif ?>
					<div class="text-dark small">¿No tienes cuenta? <a href="?c=registro">Registrate</a></div>
					<hr>
					<button type="submit">Iniciar sesión</button>
				</form>
			</div>
		</div>
	</div>

</body>
</html>