<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Formularío alta</title>
      <link rel="stylesheet" href="../css/index.css" />
   </head>
   <body>
      <table>
         <form id="form1" name="form1" method="post" action="recepcion.php" enctype="multipart/form-data">
            <tr>
               <td colspan="4" class="cabecera">Alta Productos</td>
            </tr>
            <tr>
               <td>Seleccione la Imagen</td>
               <td><input type="file" name="file" id="file"/></td>
            </tr>
            <tr>
               <td>Nombre</td>
               <td><input type="text" name="txtNombreAlta" id="nombre" /></td>
            </tr>
            <tr>
               <td>Descripción</td>
               <td><input type="text" name="txtDescAlta" id="nombre" /></td>
            </tr>
            <tr>
               <td>Precio</td>
               <td><input type="text" name="txtPrecioAlta" id="nombre" />
               <td>
            </tr>
            <tr>
               <td>Stock</td>
               <td><input type="text" name="txtStockAlta" id="nombre" /></td>
            </tr>
            <tr>
               <td>Fecha</td>
               <td><input type="datetime" name="dttFechaAlta"></td>
               <td><input type="submit" name="Aceptar" id="Aceptar" value="Aceptar" class="boton3" /></td>
            </tr>
      </table>
      </form>
      <table>
         <tr>
            <td><a href="buscar.php" class="boton2">Volver</a></td>
            <td><a href="..tienda2/users/desactivacion.php" class="boton2">Cerrar Sesión</a></td>
         </tr>
      </table>
   </body>
</html>

