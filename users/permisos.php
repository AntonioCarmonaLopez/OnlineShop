<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Manejar permisos</title>
﻿<?php
//establecemos conexion con el servidor con B.D
include("../conexion.php"); ?>
<?php
session_start();
echo 'permisos'.$_SESSION['sesion']['permisos'];

?>
</body>
</html>
