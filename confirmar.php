<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <div class="cabecera">
         <a href ="index2.php">Inicio</a> | <a href ="contacto.html">Contacto</a> | <a href ="users/entrada.php">Login</a>
      </div>
      <br>
   <body>
      <h1>Confirmar Pedido</h1>
      <!--se presentan datos recuperados del carro de la compra-->
      <table style="margin: 0 auto;">
         <tr>
            <td colspan="5" class="titulo">Carro Compra</td>
         </tr>
         <?php include ('conexion.php'); ?> 
         <?php
            session_start();
            $carro=$_SESSION['carro'];
            	if (isset($carro)){
                  	$total=0;
            for ($i=0;$i<count($carro);$i++){
            //condicional para que no arme una columna para fila eliminada
            	if ($carro[$i]<>NULL){
             ?>
         <tr>
            <td>Nombre<input type="text" disabled="disabled" value="<?php echo $carro[$i]['nombre'] ?>" /></td>
            <td>Precio<input type="text" disabled="disabled" value="<?php echo $carro[$i]['precio'] ?>" /></td>
            <td>Cantidad<input type="text" name="txtcantidad2" disabled="disabled" value="<?php echo $carro[$i]['cantidad'] ?>" size="2" maxleng="2"/></td>
            <?php
               $subtotal=$carro[$i]['precio']*$carro[$i]['cantidad'];
               $total=$total+$subtotal;
               ?>
            <td>Subtotal<input type="text" size="10" disabled="disabled" value="<?php echo $subtotal ?>" read_only="read_only">
         </tr>
         <?php 
            }
            	}
            ?>
         <tr>
            <td>Total</td>
            <td></td>
            <td></td>
            <td align="right"><input type="text" size="10" disabled="disabled" value="<?php echo $total ?>" ></td>
         </tr>
         <?php
            }
            ?>
         <tr></tr>
      </table>
      <br><br>
      <table style="margin: 0 auto;">
         <tr>
            <td>
               <!-1- formulario que envia correo confirmación y crea fila en tabla pedidos-->
               <form action="validar.php" method="post" id="frmvalidar">
                  <input type="submit" name="Validar" id="validar" value="Validar Pedido" class="boton negro redondo"/>
               </form>
            <td><a href="index2.php" class="boton negro redondo">Seguir Comprando</a></td>
      </table>
      <table>
         <h1 class="titulo">Datos Cliente</h1>
         <form action="enviar.php" name="frmEnviar" method="post">
            <tr>
               <td>Nombre y Apellidos</td>
               <td><input type="text" name="txtNombre" id="nombre" /></td>
            </tr>
            <tr>
               <td>Email</td>
               <td><input type="text" name="txtEmail" id="email" /></td>
            </tr>
            <tr>
               <td>Teléfono Contacto</td>
               <td><input type="text" name="txtTel" id="tel" /></td>
            </tr>
      </table>
      <br><br><br>
      <table align="center">
      <tr>
      <td><input type="submit" name="Confirmar" id="Confirmar" value="Confirmar" class="boton negro redondo" /></td>
      </tr>
      </table>
      </form>
   </body>
</html>
