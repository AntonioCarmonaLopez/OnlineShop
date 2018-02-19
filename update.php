<?php
//establecemos conexion con el servidor con B.D
include("conexion.php");
?>
<?php
$id=$_POST['idtxt'];
$img=$_POST['file'];
$nombre=$_POST['txtNombreMod'];
$precio=$_POST['txtPrecioMod'];
$desc=$_POST['txtDescMod'];
$stock=$_POST['txtStockMod'];
$fecha=$_POST['txtFechaMod'];

$ruta="imagenes/" . $_FILES["imagenNueva"]["name"];

//echo 'ruta' .$ruta;

if ($_FILES["imagenNueva"]["error"] > 0){
	echo "Error: " . $_FILES["imagenNueva"]["error"] . "<br />";
}
else{
	echo "Nombre imagen: " . $_FILES["imagenNueva"]["name"] . "<br />";
	echo "Tipo imagen: " . $_FILES["imagenNueva"]["type"] . "<br />";
	echo "Tamaño imagen: " . ($_FILES["imagenNueva"]["size"] / 1024) . " kilobytes<br />";

	if (file_exists("imagenes/".$_FILES["imagenNueva"]["name"])){
  		echo $_FILES["imagenNueva"]["name"] . "La imagen ya existe.";
		$sql="UPDATE productos
		SET imagen='$img',nombre='$nombre',descripcion='$desc',
		precio='$precio',stock='$stock',fecha='$fecha'
		WHERE id='$id'";
  		}
	else{
  	move_uploaded_file($_FILES["imagenNueva"]["tmp_name"],"imagenes/".$_FILES["imagenNueva"]["name"]);
	$imagen="/imagenes/" . $_FILES["imagenNueva"]["name"];
  	echo "Almacenada en: " . "/home/antonio/tienda2/imagenes/" . $_FILES["imagenNueva"]["name"];
  	echo "Imagen subida";
	$sql="UPDATE productos
	SET imagen='$ruta',nombre='$nombre',descripcion='$desc',
    	precio='$precio',stock='$stock',fecha='$fecha'
	WHERE id='$id'";
  	}
}


$result=mysql_query($sql);
if($result){
echo "Actualización se realizo OK";
echo "<BR>";
}

else {
echo "El registro no se actializo";
}
mysqli_close($descriptor);
?>

<html>
 <head>
  <meta http-equiv="refresh" content="0; url=buscar.php">
 </head>
</html>
