<html>
	<head>
		<title>acceso</title>
	</head>
<body>
<?php
include("conexion.php");
session_start();
$_SESSION['acceso'];
session_destroy();
header("LOCATION:entrada.php"];
?>
</body>
</html>
