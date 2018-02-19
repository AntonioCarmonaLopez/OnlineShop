<?php
session_start();
include ('conexion.php'); 

$nombre=$_POST['txtNombre'];
$email=$_POST['txtEmail'];
$telefono=$_POST['txtTel'];

$carro=$_SESSION['carro'];

for ($i=0;$i<count($carro);$i++){
//condicional para que no arme una columna para fila eliminada
	if ($carro[$i]<>NULL){
		$subtotal=$carro[$i]['precio']*$carro[$i]['cantidad'];
		$total=$total+$subtotal;
		$pedido='
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Confirmación Pedido</title>
		<link rel="stylesheet" href="css/index.css" />
 
		</head>

		<body>
		<h1>Confirmacion Pedido</h1>
		<table border=1>
		<tr>
		<td colspan="4" class="cabecera">Pedido</td>
		</tr>
		<tr class="cabecera">
		 <td>Articulo</td>
		 <td>Precio</td>
		 <td>Cantidad</td>
		 <td>Subtotal</td>
		</tr>
		<tr class="contenido">
		 <td>'.$carro[$i]['nombre'].'</td>
		 <td>'.$carro[$i]['precio'].'</td>
        	 <td>'.$carro[$i]['cantidad'].'</td>
        	 <td>'.$subtotal.'</td>
		</tr>';
	}
}
$pedido.='<tr  class="total"><td colspan="3">Total: </td><td>'.$total;
$pedido.='</td></tr></table>';
echo $pedido;
'</body>
</html>';


// Varios destinatarios
/*$para  = $email . ', '; // atención a la coma
$para .= 'email@tienda.com';

// subject
$titulo = 'Confirmación de su compra';

// message
$mensaje = $pedido;

// Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'From: tienda on-line <email@tienda.com>' . "\r\n";


// Mail it
mail($para, $titulo, $mensaje, $cabeceras);*/

//creo registro en B.D
$sql = "INSERT INTO pedidos (nombre,email,telefono) VALUES ('$nombre','$email','$telefono')";

$ok=mysql_query($sql,$descriptor);

if ($ok){
	echo 'inserción con éxito';
}else{
	echo 'no se puede insertar';
}
mysql_close($descriptor); // Cerramos la conexion con la base de datos 
?>







