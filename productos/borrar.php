<?php include ('../conexion.php'); ?>

<?php
$id=$_POST['idtxt3'];
//echo 'id' .$id;
$sql="DELETE from productos where id='$id'";

$result=mysql_query($sql);
if($result){
echo "Eliminación producto se realizo OK";
echo "<BR>";
}

else {
echo "El Borrado fallo";
}
mysqli_close($descriptor);
?>

<html>
 <head>
  <meta http-equiv="refresh" content="0; url=buscar.php">
 </head>
</html>
