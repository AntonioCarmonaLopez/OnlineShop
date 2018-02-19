<?php include ('conexion.php'); ?>
<?php
if ($_FILES["file"]["error"] > 0){
	echo "Error: " . $_FILES["file"]["error"] . "<br />";
}
else{
	echo "Nombre imagen: " . $_FILES["file"]["name"] . "<br />";
	echo "Tipo imagen: " . $_FILES["file"]["type"] . "<br />";
	echo "Tamaño imagen: " . ($_FILES["file"]["size"] / 1024) . " kilobytes<br />";

	if (file_exists("../imagenes/".$_FILES["file"]["name"])){
  		echo $_FILES["file"]["name"] . "La imagen ya existe.";
  		}
	else{
  	//move_uploaded_file($_FILES["file"]["tmp_name"],"/web/".$_FILES["file"]["name"]);
  	move_uploaded_file($_FILES["file"]["tmp_name"],"../imagenes/".$_FILES["file"]["name"]);
	$imagen="imagenes/" . $_FILES["file"]["name"];
  	echo "Almacenada en: " . "/home/antonio/tienda2/imagenes/" . $_FILES["file"]["name"];
  	echo "Imagen subida";
  	}
}

$nombre=$_POST['txtNombreAlta'];
$nombre=$_POST['txtNombreAlta'];
$desc=$_POST['txtDescAlta'];
$precio=$_POST['txtPrecioAlta'];
$stock=$_POST['txtStockAlta'];
$fecha=$_POST['dttFechaAlta'];



sql = "INSERT INTO productos (imagen,nombre,descripcion,precio,stock,fecha) VALUES ('$imagen','$nombre','$desc','$precio','$stock','$fecha')";

$ok=mysql_query($sql,$descriptor);

if ($ok){
	echo 'inserción con éxito';
}else{
	echo 'no se puede insertar';
}
mysql_close($descriptor); // Cerramos la conexion con la base de datos 
?>
