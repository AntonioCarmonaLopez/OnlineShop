<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Modificar Producto </title>
      <link rel="stylesheet" href="css/index.css" />
   </head>
   <body>
      ﻿<?php
         //establecemos conexion con el servidor con B.D
         include("conexion.php");
         ?>
      <?php
         $id2=$_POST['idtxt2'];
         //echo 'id' .$id2;
         $consulta=mysql_query("select* from productos where id = '$id2'"); 
         $fila=mysql_fetch_array($consulta);
         
         $id=$fila['id'];
         $img=$fila['imagen'];
         $nombre=$fila['nombre'];
         $desc=$fila['descripcion'];
         $precio=$fila['precio'];
         $stock=$fila['stock'];
         $fecha=$fila['fecha'];
         ?>
      <body>
         <h1>Modificar Producto</h1>
         <table>
            <form id="form1" name="form1" method="post" action="update.php" enctype="multipart/form-data">
               <div class="titulo">
                  <tr>
                     <td  colspan="3" class="cabecera">Modificar Producto</td>
                     <input type="hidden" name="idtxt" id="id" value="<?php echo $id ?>" />
                  </tr>
               </div>
               <tr>
                  <td>Imagen</td>
                  <td><img src="<?php echo $img ?>" alt="" width="70" height="70"/></td>
                  <td><input type="file" name="imagenNueva" id="imagenNueva" /></td>
               </tr>
               <tr class="contenido">
                  <td colspan="2">Nombre</td>
                  <td><input type="text" name="txtNombreMod" id="nombre" value="<?php echo $nombre ?>" /></td>
               </tr>
               <tr class="contenido">
                  <td colspan="2">Descripción</td>
                  <td><input type="text" name="txtDescMod" id="descripcion" value="<?php echo $desc ?>" /></td>
               </tr>
               <tr class="contenido">
                  <td colspan="2">Precio</td>
                  <td><input type="text" name="txtPrecioMod" id="descripcion" value="<?php echo $precio ?>" /></td>
               </tr>
               <tr class="contenido">
                  <td colspan="2">Stock</td>
                  <td><input type="text" name="txtStockMod" id="descripcion" value="<?php echo $stock ?>" /></td>
               </tr>
               <tr class="contenido">
                  <td colspan="2">Cantidad</td>
                  <td><input type="text" name="txtFechaMod" id="descripcion" value="<?php echo $fecha ?>" /></td>
               </tr>
               <tr>
                  <td><input type="submit" name="Modificar" id="Modificar" value="Modificar" class="boton3" /></td>
         </table>
         </form>
         <table>
            <tr>
               <td><a href="buscar.php" class="boton2">Volver</a></td>
               <td><a href="..tienda2/users/desactivacion.php" class="boton2">Cerrar Sesión</a></td>
            </tr>
         </table>
         <?php
            mysqli_close($descriptor);
            ?>
   </body>
</html>
   
