<?php

if(isset($_REQUEST['id'])){
	if (!$_REQUEST['id']) {
		header('Location: index.php?action=administrar');
	} else {
		$contactoCliente->eliminar($_REQUEST['id'], $_SESSION['usuario']);
		header('Location: index.php?action=administrar');
	}
}

?>