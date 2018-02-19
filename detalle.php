<!DOCTYPE html>
<?php
   //se incluye archivo php que contiene el descriptor para conectarnos a la B.D
   include('conexion.php'); ?>
<html>
   <head>
      <meta charset="utf-8" />
      <title>Tienda On-Line</title>
      <link rel="StyleSheet" href="css/index2.css" media="all" type="text/css">
   </head>
   <body>
      <div class="cabecera">
         <a href ="index2.php">Inicio</a> | <a href ="contacto.html">Contacto</a> | <a href ="users/entrada.php">Login</a>
         <div class="carro"><a href="carro2.php"><img src="imagenes/iconos/carro_compra.jpg" width="25" height="25"></a></div>
      </div>
      <br>
      <?php
         //variable consulta el registro
         $id=$_POST['id'];
         $img=$_POST['imagen'];
         $nombre=$_POST['nombre'];
         $desc=$_POST['descripcion'];
         $precio=$_POST['precio'];
         ?>
      <div class="titulo">Detalle de <?php echo $nombre ?></div>
      <div class="content">
      <div class="productos">
         <form action="carro2.php" method="post" name="carro">
            <input name="id" type="hidden" value="<?php echo $id ?>">
            <input type="hidden" name="imagen" value="<?php echo $img?>"/>
            <input type="hidden" name="nombre" value="<?php echo $nombre?>"/>
            <input type="hidden" name="precio" value="<?php echo $precio?>"/>
            <input name="cantidad" type="hidden" value="1">
            <h2><?php echo $nombre ?></h2>
            <img src="<?php echo $img ?>" width="140" height="100">
            <p><?php echo $precio ?></p>
            <input type="submit" class="boton negro redondo" value="Agregar a Carro" >
         </form>
      </div>
      <div class="productos">
         <h3>Descipción de <?php echo $nombre ?></h3>
         <p><?php echo $desc ?></p>
      </div>
      <table style="position:absolute;top:400px;left:45px;">
         <tr>
            <td><a href="index2.php" class="boton negro redondo">Seguir Comprando</a>
         </tr>
         </td>
      </table>
   </body>
</html>
