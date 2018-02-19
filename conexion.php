<html>
	<head>
		<meta charset="utf-8">﻿
		<title>conexión</title>
	</head>
<body>
<?php
$servidor="localhost";
$usuario="root";
$clave="root";
$base_de_datos="tienda";

$descriptor=mysql_connect($servidor,$usuario,$clave) or die("no se pudo establecer la conesión con la B.D".mysql_error());

mysql_select_db($base_de_datos);

?>
</body>
</html>
