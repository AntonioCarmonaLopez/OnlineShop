<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
   <head>
      <meta charset="utf-8" />
      <title>Tienda On-Line</title>
      <link rel="StyleSheet" href="css/index2.css" media="all" type="text/css">
   </head>
   <body>
      <div class="cabecera"><a href ="index2.php">Inicio</a> | <a href ="contacto.html">Contacto</a> | <a href =users/entrada.php">Login</a></div>
      <?php
         //se inicia sesión
         session_start();
         $id=$_POST['id'];
         $nombre=$_POST['nombre'];
         $precio=$_POST['precio'];
         $cantidad=$_POST['cantidad'];
         
         //se incluye descriptor conexión B.D
         include ('conexion.php');
         //si si captura la variable id, se recogen otras variables y se guardan en el array 
         if (isset($_POST['id'])){
         
         	$carro[]=array('id'=>$id,'nombre'=>$nombre,'precio'=>$precio,'cantidad'=>$cantidad);
         }
         //si existe la sesión carro, se recuperan valores y se añaden y/o modifican articulos
         if (isset($_SESSION['carro'])){
         	    $carro=$_SESSION['carro'];
         		if (isset($_POST['id'])){
         			$id=$_POST['id'];
         			$nombre=$_POST['nombre'];
         			$precio=$_POST['precio'];
         			$cantidad=$_POST['cantidad'];
         			$j=-1;
         			for($i=0;$i<count($carro);$i++){
         				if($id==$carro[$i]['id']){
         					$j=$i;
         				}
         			}
         			if($j<>-1){
         				$stock=$carro[$j]['cantidad']+$cantidad;
         				$carro[$j]=array('id'=>$id,'nombre'=>$nombre,'precio'=>$precio,'cantidad'=>$stock);
         			}else{
         				$carro[]=array('id'=>$id,'nombre'=>$nombre,'precio'=>$precio,'cantidad'=>$cantidad);
         				}
         	}
         }
         
         //formulario eliminar fila
         if(isset($_POST['eliminar'])){
         	$indice=$_POST['eliminar'];	
         	$carro[$indice]=NULL;	
         }	
         //formulario actualizar cantidad
         if(isset($_POST['actualizar'])){
         	$cantidad2=$_POST['txtcantidad2'];
         	
         	//if($stock2<=$cantidad2){
         		$indice=$_POST['actualizar'];
         		$carro[$indice]['cantidad'] = $cantidad2;
         	//}
         	//else{
         	//	$message = "wrong answer";
         	//	echo "<script type='text/javascript'>alert('$message');</script>";
         	//}
         		
         }
         
         //si existe el array carro, este = nuestra sesión
         if (isset($carro)) $_SESSION['carro']=$carro;
         
          
         ?>
      <!--se presentan datos recuperados/actualizados y se calcula total y subtotal-->
      <table width="90%" border="0">
         <div class="titulo">Cesta Compra</div>
         <?php
            if (isset($carro)){
            $total=0;
            for ($i=0;$i<count($carro);$i++){
            //condicional para que no arme una columna para fila eliminada
            if ($carro[$i]<>NULL){
            ?>
         <tr class="producto">
            <td>Nombre<input type="text" disabled="disabled" value="<?php echo $carro[$i]['nombre'] ?>" read_only="read_only"/></td>
            <td>Precio<input type="text" disabled="disabled" value="<?php echo $carro[$i]['precio'] ?>" read_only="read_only"/></td>
            <td>
               Cantidad 
               <form action="" method="post" name="frmactualizar">
                  <input name="actualizar" type="hidden" value="<?php echo $i ?>" />
            <td><input type="text" name="txtcantidad2" value="<?php echo $carro[$i]['cantidad'] ?>" size="2"maxleng="2"/></td>
            <td><input name="" type="image" src="imagenes/iconos/check-green-gloss-001.png" width="40" height="40"/></td>
            </form>
            </td>
            <?php
               $subtotal=$carro[$i]['precio']*$carro[$i]['cantidad'];
               $total=$total+$subtotal;
               ?>
            <td>
               Subtotal<input type="text" size="10" disabled="disabled" value="<?php echo $subtotal ?>" read_only="read_only">
               <form action="" method="post" name="frmeliminar">
                  <input name="eliminar" type="hidden" value="<?php echo $i ?>"/>
            <td><input name="" type="image" src="imagenes/iconos/menos.png" width="40" height="40"/></td>
            </form></td>
         </tr>
         <?php 
            }
             }
            }
            ?>
         <tr>
            <td colspan="7">Total</td>
            <td class="total"><?php echo $total ?></td>
         </tr>
      </table>
      <p><br>
      <table style="margin: 0 auto;">
         <tr>
            <td>
               <form action="confirmar.php" name="confirmar" id="confirmar">
                  <input type="submit" name="btnconfirmar" value="Confirmar Pedido" class="boton negro redondo"/>
               </form>
            </td>
            <td>
               <a href="index2.php" class="boton negro redondo">Seguir Comprando</a>
            </td>
         </tr>
      </table>
      </p>
   </body>
</html>
