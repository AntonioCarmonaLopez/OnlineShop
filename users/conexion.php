<html>
	<head>
		<meta charset="utf-8">﻿
		<title>conexion</title>
	</head>
<body>
<script language="php">
$servidor="localhost";
$usuario="root";
$clave="root";
$base_de_datos="tienda";

$descriptor=mysql_connect($servidor,$usuario,$clave);
mysql_select_db($base_de_datos);
</script>
</body>
</html>
