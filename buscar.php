<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8" />
      <title>Buscar Producto</title>
      <link rel="StyleSheet" href="css/index.css" media="all" type="text/css">
   </head>
   <body>
      <h1>Buscar Producto</h1>
      <form id="formulario" name="frmbuscar" method="post" action="">
         <table width="841" border="0">
            <tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <!--botón y campo de texto para buscar-->
               <td><input type="search" id="" name="" placeholder="buscar..."> </td>
               <td><input type="submit" value="Buscar" class="boton2"></p>
      </form>
      </td>
      <tr class="cabecera">
      <td>ID</td>
      <td>IMAGEN</td>
      <td>NOMBRE</td>
      <td>DESCRIPCIÓN</td>
      <td>PRECIO</td>
      <td>STOCK</td>
      <td>FECHA</td>
      <td></td>
      <td></td>
      </tr>
      <?php
         //se incluye archivo php que contiene el descriptor para conectarnos a la B.D
             include('conexion.php'); ?>
      <?php
         session_start();
         //echo 'permisos'.$_SESSION['sesion']['permisos'];
         if ($_SESSION['sesion']['permisos']==1){
         //se hace una query de todos los productos de la B.D
             $consulta=mysql_query("select* from productos");
         //Si se pulsa el botón de busqueda, consulta condicionada por contenido cuado texto
             if (isset($_POST['btnBuscar'])){
                 $consulta=mysql_query("select* from productos where nombre like '%".$_POST['txtBuscar']."%'");
             }
         //se ejecuta consuta fila a fila y guarda el resultado en array filas
                 while($filas=mysql_fetch_array($consulta)){
                     $id=$filas['id'];
                     $img=$filas['imagen'];
                     $nombre=$filas['nombre'];
                     $desc=$filas['descripcion'];
                     $precio=$filas['precio'];
                     $stock=$filas['stock'];
                     $fecha=$filas['fecha'];
                     ?>  
      <!--se construye la tabla que albergará los datos recuperados-->     
      <tr class="contenido">
      <td><?php echo $id ?></td>
      <td><img src="<?php echo $img; ?>" alt="" width="70" height="70"/><br/></td>
      <td><?php echo $nombre ?></td>
      <td><?php echo $desc ?></td>
      <td><?php echo $precio ?></td>
      <td><?php echo $stock ?></td>
      <td><?php echo $fecha ?></td>
      <!-- botón editar, cambia producto seleccionado -->
      <td><form action="modificar.php" method="post" name="Editar">
      <input name="idtxt2" type="hidden" value="<?php echo $id ?>">
      <input name="btnEditar" type="submit" value="Editar" class="boton"></form></td>
      <td><form action="borrar.php" method="post" name="Borrar">
      <input name="idtxt3" type="hidden" value="<?php echo $id ?>">		
      <input name="btnBorrar" type="submit" value="Borrar" class="boton"></form></td>
      </tr>  
      <?php }?>                                                     
      </table> 
      <?php }?> 
      <table>
         <tr>
            <td><a href="users/desactivacion.php" class="boton2">Cerrar Sesión</a></td>
            <td><a href="productos/alta.php" class="boton2">Alta Producto</a></td>
         </tr>
      </table>
   </body>
</html>
